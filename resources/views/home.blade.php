@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2>
                    {{ $author }}
                </h2>
                <a class="btn btn-lg btn-info" href="{{'newsort/' . $author}}">发布</a>
            </div>
            <div>
            @if(empty($lists))
                <h2>暂无数据</h2>
            @else
                @foreach($lists as $key => $list)
                    <form class="form-inline">
                        <div class="form-group" style="float:left">
                        <a class="right" href="{{'article/' . $list->article_id }}">{{$list->title}}</a>
                        </div>
                        <div class="form-group" style="float:right">
                            <p>{{$list->created_at}}</p>
                        </div>
                        <br>
                        <div class="panel-body">
                            <p>{{$list->description}}</p>
                        </div>

                        <br>
                    </form>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
