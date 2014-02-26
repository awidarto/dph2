@extends('layout.book')

@section('content')
    <style type="text/css">
        .toc-item{
            list-style-type: none;
        }

        .synopsis{
            display: inline-block;
        }

        .item-img img{
            border-radius: 16px;
        }

        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .synopsis, .chevron{
                display:none;
            }
        }

        @media only screen and (max-width: 479px) {
            .synopsis, .chevron{
                display:none;
            }

            .toc-item h3{
                margin-top: 5px;
                margin-left: 8px;
            }
        }
    </style>

    <h2>TOC</h2>
    <?php $idx = 0; ?>
    @foreach ($pages as $page)
        <?php
            $mt = $meta[$idx];
            $title = $mt->title;
            $synopsis = $mt->synopsis;
        ?>
        @if( $page != 'cover')
        <li class="toc-item">
            <a class="scroll" href="{{ URL::to('chapter/'.$pages[$idx])}}">
                <div class="container" style="background: url({{ URL::to('/') }}/images/toc-thumb.jpg) 10px 10px no-repeat; background-size: 75px 75px;padding:5px;padding-left:85px;min-height:80px;height:80px" >

                    <div class="thirteen columns">
                        <h3>{{ $title }}</h3>
                        <p class="synopsis">
                            {{ truncate($synopsis, 200) }}
                        </p>
                    </div>

                    <div class="one columns chevron" style="position:relative;">
                        <i class="fa fa-chevron-right fa-2x" style="position:absolute;right:0;top:30px;margin:auto 0px auto 0px;" ></i>
                    </div>
                </div>
            </a>
        </li>
        @endif
        <?php $idx++; ?>

    @endforeach

<?php
function truncate($string, $length, $stopanywhere=false) {
    //truncates a string to a certain char length, stopping on a word if not specified otherwise.
    if (strlen($string) > $length) {
        //limit hit!
        $string = substr($string,0,($length -3));
        if ($stopanywhere) {
            //stop anywhere
            $string .= '...';
        } else{
            //stop on a word.
            $string = substr($string,0,strrpos($string,' ')).'...';
        }
    }
    return $string;
}
?>
@stop