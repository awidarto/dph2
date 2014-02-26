@extends('layout.fbb')

@section('nav')
    <style type="text/css">
        .menu-toc li a {
            color: #fff;
            font-size: 1.1em;
            line-height: 2.2;
            cursor: pointer;
        }

        .menu-toc li a p{
            color: #fff;
            font-size: 0.9em;
        }
    </style>

    <?php
        $index = 0;
    ?>
    @foreach($pages as $page)
        <?php
            $t = $meta[$index]->title;
            $s = $meta[$index]->synopsis;
            $index++;
        ?>
        @if($page != 'cover')
            <li>
                <a href="#{{$page}}">

                    <h2>{{ $t }}</h2>
                    <p>
                        {{ truncate($s, 150) }}
                    </p>
                </a>
            </li>
        @endif
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

