@extends('layout.book')

@section('content')
    @include('pages.'.$pages[$current])
@stop