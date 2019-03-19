@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>文章 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/post/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 创建新文章
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="posts-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>标题</th>
                        <th>发布状态</th>
                        <th>发布时间</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <a href="/post/{{$post->id}}">{{ $post->title }}</a>
                            </td>
                            <td>
                            @if( $post->is_draft)
                                未发布
                            @else
                                已发布
                            @endif</td>
                            <td data-order="{{ $post->published_at->timestamp }}">
                                {{ $post->published_at->format('Y-m-d H:m:s') }}
                            </td>
                            <td>
                                <a href="/admin/post/edit/{{ $post->id }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 
                                </a>
                                <a href="/admin/post/delete/{{$post->id}}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-minus"></i> 
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#posts-table").DataTable({
                order: [[0, "desc"]]
            });
        });
        
    </script>
@stop