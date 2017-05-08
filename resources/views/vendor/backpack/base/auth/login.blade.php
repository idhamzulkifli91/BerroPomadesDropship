<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BerroLab customer login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{ asset('login/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('login/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('login/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('login/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('login/ico/apple-touch-icon-57-precomposed.png') }}">

</head>

<body style="background-color: #4c5761">

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">


                        <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login</h3>
                            <p>Enter your username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form class="login-form" role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control input-lg" name="email" placeholder="Email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control input-lg" placeholder="Password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary-dark">Sign in</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="{{ asset('login/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('login/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('login/js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('login/js/scripts.js') }}"></script>

<!--[if lt IE 10]>
<script src="{{ asset('login/assets/js/placeholder.js') }}"></script>
<![endif]-->
</div>
</body>

</html>




