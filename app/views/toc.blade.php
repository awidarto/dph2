@extends('layout.book')

@section('content')
    <style type="text/css">
        .toc-item{
            list-style-type: none;
        }

        .synopsis{
            display: inline-block;
        }

        p.synopsis{
            margin: 0px;
            font-size: 12px;
        }

        .toc-item a{
            text-decoration: none;
        }

        .toc-item a .item-bar{
            padding:5px;
            padding-left:95px;
            min-height:80px;
            height:80px;
            position: relative;
            padding-right: 40px;
        }



        .item-img img{
            border-radius: 16px;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .chevron{
            position: absolute;
            top:0;
            right:0;
            height: 100%;
            width: 30px;
            display: inline-block;
            background: url({{ URL::to('/') }}/chapter_data/thumbs/chevronright.png) top right no-repeat;
        }

        h3.no-thumb{
            margin-top: 20px;
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
    @media only screen and (max-width: 320px) {
        .synopsis, .chevron{
            display:none;
        }

        h3{
            margin-top: 15px;
            margin-left: 15px;
        }
    }

    @media only screen and (max-width: 480px) {
        .synopsis{
            display:none;
        }

        h3{
            margin-top: 15px;
            margin-left: 15px;
            font-size: 16px;
        }
    }





    </style>
    <?php $idx = 0; ?>
    @foreach ($pages as $page)
        <?php
            $mt = $meta[$idx];
            $title = $mt->title;
            $synopsis = $mt->synopsis;
        ?>
        @if( $page != 'cover')
            <?php
                $tname = str_pad($idx,2,'0', STR_PAD_LEFT);
                if(!file_exists(public_path().'/chapter_data/thumbs/'.$tname.'.png')){
                    $tname = 'transthumb';
                }
            ?>
        <li class="toc-item">
        @if($flat == true)
            <a class="scroll" href="{{ URL::to($pages[$idx])}}.html">
        @else
            <a class="scroll" href="{{ URL::to('chapter/'.$pages[$idx])}}">
        @endif
                <div class="item-bar" style="background: url({{ URL::to('/') }}/chapter_data/thumbs/{{ $tname }}.png) 10px 10px no-repeat;background-size: 75px 75px;" >

                        @if($page == 'preface' || $page == 'endnote')
                            <h3 class="no-thumb">{{ $title }}</h3>
                        @else
                            <h3>{{ $idx }}. {{ $title }}</h3>
                            <p class="synopsis">
                                {{ $synopsis }}
                            </p>
                        @endif
                            <?php $idx++; ?>
                        <div class="chevron">
                        </div>
                </div>
            </a>
        </li>
        @endif

    @endforeach

<?php
/*
            @if($page != 'preface' && $page != 'endnote')
                    <div class="fourteen columns" style="" >
            @else
                    <div class="fourteen columns" style="background: url({{ URL::to('/') }}/chapter_data/thumbs/chevronright.png) top right no-repeat;padding-right:30px;padding-top:25px;" >
            @endif

                    </div>

*/

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