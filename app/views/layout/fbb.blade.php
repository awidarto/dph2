<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dover Park Stories</title>
        <meta name="description" content="Fullscreen Pageflip Layout of Dover Park Stories" />
        <meta name="keywords" content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu" />
        <meta name="author" content="Andy Awidarto" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.custom.css" />
        <link rel="stylesheet" type="text/css" href="css/bookblock.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script src="js/modernizr.custom.79639.js"></script>
    </head>
    <body>
        <div id="container" class="container">

            <div class="menu-panel">
                <a href="{{URL::to('/')}}"><h3>Dover Park Stories</h3></a>
                <h4>Table of Content</h4>
                <ul id="menu-toc" class="menu-toc">
                    @section('nav')
                        This is the master sidebar.
                    @show
                </ul>
                <div>
                    <a href="http://analytics.kickstartlab.com/dph2">&copy; 2014 Jayon Books</a>
                </div>
            </div>

            <div class="bb-custom-wrapper">
                <div id="bb-bookblock" class="bb-bookblock">
                    @yield('content')
                </div>

                <nav>
                    <span id="bb-nav-prev">&larr;</span>
                    <span id="bb-nav-next">&rarr;</span>
                </nav>

                <span id="tblcontents" class="menu-button">Table of Contents</span>

            </div>

        </div><!-- /container -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/jquery.jscrollpane.min.js"></script>
        <script src="js/jquerypp.custom.js"></script>
        <script src="js/jquery.bookblock.js"></script>
        <script src="js/page.js"></script>
        <script>
            $(function() {

                Page.init();

            });
        </script>
    </body>
</html>
