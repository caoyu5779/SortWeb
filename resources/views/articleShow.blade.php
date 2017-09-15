@extends('layouts.app')

@section('sidebar')
    @parent
    <p> This is the side bar</p>
@endsection

@section('content')
    <div class="container">
    <h2>
        {{ $list['title'] }}
    </h2>
        <div class="panel-body">
            <p>
                {{$article['code']}}
            </p>
        </div>
    </div>

@endsection
