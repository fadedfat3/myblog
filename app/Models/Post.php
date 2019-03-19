<?php

namespace App\Models;

use App\Services\Markdowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $dates = ['published_at'];

    // 在 Post 类的 $dates 属性后添加 $fillable 属性
    protected $fillable = [
        'title', 'content_raw', 'is_draft', 'published_at', 'meta_description'
    ];

    // 然后在 Post 模型类中添加如下几个方法

    /**
     * 返回 published_at 字段的日期部分
     */
    public function getPublishedDateAttribute($value)
    {
        return $this->published_at->format('Y-m-d');
    }

    /**
     * 返回 published_at 字段的时间部分
     */
    public function getPublishedTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
     * content_raw 字段别名
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

    /**
     * content_html 
     */
    public function getContentHtmlAttribute($value)
    {
        $markdown = new Markdowner();
        return $markdown->toHtml($this->content);
    }

    /**
     * abstract 字段别名
     */
    public function getAbstractAttribute()
    {   
        if ($this->meta_description){
            return $this->meta_description;
        }
        preg_match_all("/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/", $this->content_html, $match);
        return mb_substr(join(' ', $match[3]), 0, 20, 'UTF-8');
    }
    /**
     * The many-to-many relationship between posts and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag_pivot');
    }

    
    /**
     * Set the HTML content automatically when the raw content is set
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
        //$markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        //$this->attributes['content_html'] = $markdown->toHTML($value);
    }

    /**
     * 设置
     */

    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->get()->pluck('id')->all()
            );
            return;
        }

        $this->tags()->detach();
    }
}