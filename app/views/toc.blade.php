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
        }

        .item-img img{
            border-radius: 16px;
        }

        h3 {
        font-size: 24px;
        margin-bottom: 8px;
        }

        @media only all and (min-width: 480px) and (max-width: 767px) {
            .synopsis, .chevron{
                display:none;
            }

            h3{
                margin-top: 15px;
                margin-left: 15px;
            }

        }

        .chevron{
            color: #999;
        }

        @media only all and (max-width: 479px) {
            .synopsis, .chevron{
                display:none;
            }

            h3{
                margin-top: 15px;
                margin-left: 15px;
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
                    $tname = 'nothumb';
                }
            ?>
        <li class="toc-item">
            <a class="scroll" href="{{ URL::to('chapter/'.$pages[$idx])}}">
                <div class="container" style="background: url({{ URL::to('/') }}/chapter_data/thumbs/{{ $tname }}.png) 10px 10px no-repeat; background-size: 75px 75px;padding:5px;padding-left:85px;min-height:80px;height:80px" >

                    <div class="thirteen columns">
                        <h3>{{ $idx }}. {{ $title }}</h3>
                        <p class="synopsis">
                            {{ $synopsis }}
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