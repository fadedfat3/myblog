<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{

    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '简介',
        'page_image' => 'example.jpg',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('admin.tag.index', ['tags' => $tags]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.tag.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        //$data = $request->validate();
        $tag = new Tag();
        foreach ($this->fields as $field => $value)
        {
            $tag->$field = $request->input($field, $value);
        }
        $tag->save();
        return redirect('/admin/tag')
        ->with('success', '标签: ' . $tag->tag . ' 创建成功.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tag = Tag::find($id);
        $data = [];
        foreach($this->fields as $field => $value)
        {
            $data[$field] = $tag->$field ?: $value;
        }
        $data['id'] = $tag->id;
        return view('admin.tag.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::find($id);
        $data = [];
        foreach($this->fields as $field => $value)
        {
            $data[$field] = $tag->$field ?: $value;
        }
        $data['id'] = $tag->id;
        return view('admin.tag.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        //
        $tag = Tag::find($id);
        foreach($this->fields as $field => $value)
        {
            $tag->$field = $request->input($field);
        }
        $tag->save();
        return redirect('/admin/tag')->with('success', '标签:' . $tag->tag . '更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('admin/tag')->with('success', '标签：' . $tag->tag . '删除成功');
    }
}
