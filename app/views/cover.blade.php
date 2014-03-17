@extends('layout.cover')

@section('content')

<style type="text/css">
html {
  background: transparent url(images/dph-bg.jpg) no-repeat fixed center bottom;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body{
    background: transparent;
}

.dossier-start-bg {
    background-size: 100%;
    text-align:center;
}

.cover-nav{
    margin-top: 5%;
    display:inline-block;
    vertical-align: middle;
}

.cover-nav a{
    float: left;
    padding: 10px;
    margin:10px;
    display: inline-block;
    color: #ccc;
}

.cover-nav h1{
    color:#444;
}

.cover-title{
    margin-top: 20%;
}



</style>

    <div class="container" style="min-height:100%;width:100%;">
        <div class="sixteen columns dossier-start-bg" style="height:100%;min-height:100%;display:block;overflow:hidden;">

            <div class="cover-title">
                <h1>走过托福园</h1>
            </div>

            <div class="cover-nav">
                <a href="{{ URL::to('toc')}}">
                    <span class="fa-stack fa-3x">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="{{ URL::to($firstchapter)}}">
                    <span class="fa-stack fa-3x">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-chevron-right fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>


        </div>
    </div>
@stop