<!DOCTYPE html>
<html>
    <head>
        <title>Agrippa - @yield('title')</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="jumbotron">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest compiled and minified JS -->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

        @yield('scriptFooter')
    </body>
</html>
