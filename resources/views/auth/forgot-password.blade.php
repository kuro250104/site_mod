<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Gestion MOD</title>
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5 pt-5">
                <div class="card-body p-0">
                        <div class="text-center">
                            <h4 class="text-gray-900 mb-4">Bienvenue</h4>
                        </div>

                    <form class="user" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <div class="p-5">
                                <div class="form-group">
                                    <label for="email">Veuillez rentrer votre adresse mail</label>
                                    <input id="email" class="form-control form-control-user" type="email" name="email" value="{{ old('email') }}" required autofocus />
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
                                                                <button type="submit" class="ml-3 btn btn-primary btn-user btn-block">
                                    Envoyer le mail de recupération
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


