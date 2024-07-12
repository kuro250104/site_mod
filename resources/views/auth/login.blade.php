<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Gestion MOD</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("img/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("img/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("img/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("img/site.webmanifest")}}">
    <link rel="mask-icon" href="{{asset("img/safari-pinned-tab.svg")}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
                                </div>
                                <div class="form-group">
                                    <label for="email"></label>
                                    <input id="email" type="email" class="form-control form-control-user" id="email" required autofocus autocomplete="username" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (\Session::has('error'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{{ \Session::get('error') }}</li>
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">

                                    <div class="custom-control small">
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('password.request')}}">
                                            Mots de passe oublié?
                                        </a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Connexion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    document.getElementById("email").setAttribute("value", "@zambongroup.com");
</script>
</html>
