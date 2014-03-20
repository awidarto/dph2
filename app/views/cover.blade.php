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

/* Laptop/Tablet (1024px) */
@media only screen and (min-width: 481px) and (max-width: 1024px) and (orientation: landscape) {
}

/* Tablet Portrait (768px) */
@media only screen and (min-width: 321px) and (max-width: 1024px) and (orientation: portrait) {
}

/* Phone Landscape (480px) */
@media only screen and (min-width: 321px) and (max-width: 480px) and (orientation: landscape) {
}

/* Phone Portrait (320px) */
@media only screen and (max-width: 400px) {
    h1 {
      font-size: 41px;
      line-height: 50px;
      margin-bottom: 100px;
    }

    i{
        font-size: 30px;
    }
}

/* iPad 3 & 4 Landscape */
@media only screen and (width: 481px) and (width: 1024px) and (orientation: landscape) {
}

/* iPad 3 & 4 Portrait */
@media only screen and (width: 481px) and (width: 1024px) and (orientation: portrait) {
}

/* iPhone 2G-3GS Landscape */
@media only screen and (width: 481px) and (width: 480px) and (orientation: landscape) {
}

/* iPhone 2G-3Gs Portrait */
@media only screen and (width: 481px) and (width: 480px) and (orientation: portrait) {
}

/* iPhone 4/4S Landscape */
@media only screen and (width: 569px) and (width: 480px) and (orientation: landscape) {
}

/* iPhone 4/4S Portrait */
@media only screen and (width: 569px) and (width: 480px) and (orientation: portrait) {
}

/* iPhone 5 Landscape */
@media only screen and (width: px) and (width: 568px) and (orientation: landscape) {
}

/* iPhone 5 Portrait */
@media only screen and (width: px) and (width: 568px) and (orientation: portrait) {
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