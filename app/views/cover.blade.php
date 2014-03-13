@extends('layout.cover')

@section('content')

<style type="text/css">
html {
  background: url(images/dph-bg.jpg) no-repeat center center fixed;
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

    .dossier-start-bg img {
        margin-top:200px;
        }

.cover-nav{
    margin-top: 400px;
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


@media only screen and (max-width: 767px) {

    .dossier-start-bg img {
        width:90%;
        height:auto;
    }

}

@media only screen and (min-width: 480px) and (max-width: 767px) {

    .dossier-start-bg img {
        width:90%;
        height:auto;
        margin-top:0px;
    }

}


</style>

    <div class="container" style="min-height:100%;width:100%;">
        <div class="sixteen columns dossier-start-bg" style="height:100%;min-height:100%;display:block;overflow:hidden;">


            <div class="cover-nav">
                <h1>走过托福园</h1>
                <h3>赖国芳</h3>
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