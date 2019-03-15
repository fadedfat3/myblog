@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>标签
                    <small>» 更新标签</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$tag}}</h3>
                    </div>
                    <div class="card-body">

                        @include('admin.partials.errors')

                        <form role="form" method="POST" action="/admin/tag/update/{{$id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        

                            @include('admin.tag._form')

                            <div class="form-group row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save"></i>
                                        保存
                                    </button>
                                    <a href='/admin/tag'>
                                        <button type="button" class="btn btn-primary btn-md">   
                                            <i class="fa fa-times-circle"></i>
                                            取消
                                         </button>
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop