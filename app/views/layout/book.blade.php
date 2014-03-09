<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Dover Park Stories</title>
    <meta name="description" content="">
    <meta name="author" content="Andy Awidarto">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    {{ HTML::style('stylesheets/base.css') }}
    {{ HTML::style('stylesheets/skeleton.css') }}
    {{ HTML::style('stylesheets/layout.css') }}
    {{ HTML::style('font-awesome-4.0.3/css/font-awesome.min.css') }}
    {{ HTML::style('stylesheets/slicknav.css') }}


    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <style type="text/css">

        ul.nav li{
            float:left;
            margin: 0px;
        }

        ul.nav li a{
            padding: 8px;
            padding-top: 16px;
            padding-bottom: 6px;
            margin: 4px;
            color:#999;
        }

        ul#menu{
            z-index: 1000;
            position: absolute;
            width: inherit;
            background: white;
            border-radius: 6px;
            border: thin solid #eee;
            min-height: 200px;
            max-height: 400px;
            overflow: auto;
            margin-top: 6px;
        }

        ul#menu li{
            margin:0px;
        }

        ul#menu li a{
            display: block;
            padding: 16px;
            text-align: left;
            text-decoration: none;
            font-weight: bold;
        }

        img{
            padding: 6px;
            border: thin solid #ccc;
        }

        img.pull-left{
            float:left;
            margin-right: 6px;
        }

        img.pull-right{
            float:right;
            margin-left: 6px;
        }

        ul#menu li a:hover{
            background-color: #ccc;
        }

        blockquote{
            border-left: none;
        }

        @media only screen and (max-width: 767px) {
            #masthead{
                text-align: center;
            }
        }

        @media only screen and (max-width: 479px) {
            #masthead{
                text-align: center;
            }

            ul#menu{
                height:80%;
            }
        }

        #nav-box{
            position: relative;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px; height: 0; overflow: hidden;
        }

        .video-container iframe,
        .video-container object,
        .video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        ul li a.dim{
            color: #eee;
        }

        .center{
            text-align: center;
        }

    </style>

    {{ HTML::script('js/jquery-1.11.0.min.js') }}

    {{ HTML::script('js/jquery.slicknav.min.js') }}

    <script type="text/javascript">
        /*


        */
        $(document).ready(function(){
            /*
            $('#bt-toc').on('click',function(){
                $('#menu').toggle();
                return false;
            })
            */
        });
    </script>

</head>
<body>



    <!-- Primary Page Layout
    ================================================== -->

    <!-- Delete everything in this .container and get started on your own site! -->

    <div class="container">

    @if($pages[$current] != 'cover')
        {{--
        <div class="ten columns">
            <a href="{{URL::to('/')}}" style="text-decoration:none;">
                <h4 class="remove-bottom" id="masthead" style="margin-top: 10px">Dover Park Stories</h4>
            </a>
        </div>
        --}}
        <div id="nav-box" class="five columns" style="display:block;padding:6px;">
            <ul class="nav" style="display:inline-block;margin:0px;margin-top:8px;">
                <li>
                    <a href="{{ URL::to('toc')}}">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @if($prev != 'toc')
                <li>
                    <a href="{{ URL::to($prev)}}">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-chevron-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ $pages[$current] }}" class="dim">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-chevron-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @endif

                @if($pages[ count($pages) - 1 ] != $pages[ $current ])
                <li>
                    <a href="{{ URL::to($next)}}">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-chevron-right fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ URL::to($next)}}" class="dim" >
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-chevron-right fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                @endif
            </ul>
            {{--

            <ul id="menu" style="display:none;">
                <?php $idx = 0; ?>
                @foreach ($pages as $page)
                    <?php
                        $mt = $meta[$idx];
                        $title = $mt->title;
                        $synopsis = $mt->synopsis;
                    ?>
                    <li>
                        <a class="scroll" href="{{ URL::to('chapter/'.$pages[$idx])}}">
                            <img src="{{ public_path() }}/images/toc-thumb.jpg">
                            <h6>{{ $title }}</h6>
                            <div class="synopsis">
                                {{ $synopsis }}
                            </div>

                        </a>
                    </li>
                    <?php $idx++; ?>

                @endforeach
            </ul>
            --}}
        </div>
    @else
            <div class="ten columns">
                <a href="{{URL::to('/')}}" style="text-decoration:none;">
                    <h2 class="remove-bottom" id="masthead" style="margin-top: 10px">走过托福园</h2>
                </a>
            </div>
    @endif
        <hr />
    </div>

    <div class="container">
        <div class="sixteen columns">
            @yield('content')
        </div>

    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>