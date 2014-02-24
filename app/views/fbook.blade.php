@extends('layout.fbb')

@section('nav')
    @foreach($pages as $page)
        <li><a href="#{{$page}}">{{$page}}</a></li>
    @endforeach
@stop

@section('content')

    @foreach($pages as $page)

    <div class="bb-item" id="{{$page}}">
        <div class="content">
            <div class="scroller">
                @include('pages.'.$page)
            </div>
        </div>
    </div>
    @endforeach

@stop

