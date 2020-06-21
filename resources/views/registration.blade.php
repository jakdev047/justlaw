<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Dashio</title>

        <!-- Favicons -->
        <link href="{{asset('img/favicon.png')}}" rel="icon">
        <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Bootstrap core CSS -->
        <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!--external css-->
        <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

    </head>

    <body>
    <!--  MAIN CONTENT -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="{{route('registrationsave')}}" method="post">
                @csrf
                <h2 class="form-login-heading"> Registration </h2>
                <div class="login-wrap">
                    <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="{{asset('lib/jquery.backstretch.min.js')}}"></script>
        <script>
        $.backstretch("img/login-bg.jpg", {
            speed: 500
        });
        </script>
    </body>

</html>
