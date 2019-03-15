@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>标签
                    <small>» 查看标签</small>
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

                        <form role="form" method="GET" action="/admin/tag">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                           
                            <div>
                                <label>标题</label>
                                <p>{{$title}}</p>
                            </div>
                            
                            <label>副标题</label>
                            <p>{{$subtitle}}</p>    
                            <label>描述信息</label>
                            <p>{{$meta_description}}</p>
                            <div class="form-group row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        
                                        确认
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop