@extends('layout.cover')

@section('content')

<style type="text/css">
    .dossier-start-bg {
        background-image:url(../../images/cover/dph-dossier-start-bg.jpg);
        background-size: 100%;
        text-align:center;
        }

    .dossier-start-bg img {
        margin-top:200px;
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

    <div class="container" style="min-height:100%;width:100%;background:url( images/dph-dossier-start-bg.jpg ) top center no-repeat">
        <div class="sixteen columns dossier-start-bg" style="height:100%;min-height:100%;display:block;overflow:hidden;">

            <a href="{{ URL::to($firstchapter)}}">
                <img src="images/dph-cover-typo.png" alt="cover" />
            </a>


        </div>
    </div>
@stop