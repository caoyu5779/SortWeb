@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong>输入不符合要求<br><br>
                                {!! !implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{url('Submit')}}" method="post">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                            <br>
                            <input type="text" name="description" class="form-control" required="required" placeholder="请输入简介">
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                            <br>
                            <button class="btn btn-info btn-lg">新增排序</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection()