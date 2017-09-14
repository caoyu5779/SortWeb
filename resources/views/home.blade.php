@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h1>
                    {{ $author }}
                </h1>
            </div>
            <div>
            @if(empty($lists))
                <h2>暂无数据</h2>
                    <a class="btn btn-lg btn-info" href="{{'newsort/' . $author}}">发布</a>
            @else
                @foreach($lists as $key => $list)
                        <a class="right">$list->author</a>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
