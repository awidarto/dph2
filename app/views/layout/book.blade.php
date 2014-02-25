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
            border-radius: 6px;
            border: thin solid #eee;
            color:#999;
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
        }
    </style>

</head>
<body>



    <!-- Primary Page Layout
    ================================================== -->

    <!-- Delete everything in this .container and get started on your own site! -->

    <div class="container">
        <div class="ten columns">
            <h2 class="remove-bottom" id="masthead" style="margin-top: 10px">Dover Park Stories</h2>
        </div>
        <div class="five columns" style="display:block;padding:6px;text-align:center;">
            <ul class="nav" style="display:inline-block;margin:0px;margin-top:8px;float;right;">
                <li><a href="{{ URL::to('chapter/'.$prev)}}"><i class="fa fa-chevron-left fa-2x"></i></a></li>
                <li><a href="{{ URL::to('toc')}}"><i class="fa fa-list fa-2x"></i></a></li>
                <li><a href="{{ URL::to('chapter/'.$next)}}"><i class="fa fa-chevron-right fa-2x"></i></a></li>
            </ul>
        </div>
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