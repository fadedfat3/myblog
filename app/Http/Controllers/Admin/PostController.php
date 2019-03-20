<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Jobs\PostFormFields;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class PostController extends Controller
{

    protected $fieldList = [
        'title' => '',
        'subtitle' => '',
        'page_image' => '',
        'content' => '',
        'meta_description' => '',
        'is_draft' => "0",
        'publish_date' => '',
        'publish_time' => '',
        'tags' => [],
    ];

    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        return view('admin.post.index', ['posts' => Post::all()]);
    }

    /**
     * Show the new post form
     */
    public function create()
    {
        $fields = $this->fieldList;

        $when = Carbon::now()->addHour();
        $fields['publish_date'] = $when->format('Y-m-d');
        $fields['publish_time'] = $when->format('g:i A');

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        $data = array_merge(
            $fields,
            ['allTags' => Tag::all()->pluck('tag')->all()]
        );

        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created Post
     *
     * @param PostCreateRequest $request
     */
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));
        $msg = $post->is_draft ? '存为草稿' : '已发布';
        return redirect()
            ->route('post.index')
            ->with('success', echo_info($post->title, '新文章', $msg));
    }

    /**
     * 更新文章
     *
     * @param PostUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        if ($post->is_draft) {
            return redirect()
                ->back()
                ->with('success', echo_info($post->title,'文章','保存为草稿.'));
        }
        return redirect()
            ->route('post.index')
            ->with('success', echo_info($post->title,'文章','已保存并发布.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()
            ->route('post.index')
            ->with('success', echo_info($post->title,'文章','已删除.'));
    }

    /**
     * Return the field values from the model
     *
     * @param integer $id
     * @param array $fields
     * @return array
     */
    private function fieldsFromModel($id, array $fields)
    {
        $post = Post::findOrFail($id);

        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $post->{$field};
        }

        $fields['tags'] = $post->tags->pluck('tag')->all();

        return $fields;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fields = $this->fieldsFromModel($id, $this->fieldList);

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        $data = array_merge(
            $fields,
            ['allTags' => Tag::all()->pluck('tag')->all()]
        );

        return view('admin.post.edit', $data);
    }

}
