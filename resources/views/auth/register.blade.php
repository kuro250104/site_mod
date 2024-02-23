<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Création de compte- Gestion MOD</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <form class ="user" method="POST" action="/register">
                        @csrf
                        <div>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Création de compte</h1>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nom et prénom</label>
                                    <input id="name" class="form-control form-control-user" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                    <!-- Display validation errors for the name field -->
                                    <div class="mt-2">
                                        @foreach($errors->get('name') as $error)
                                            <span>{{ $error }}</span><br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control form-control-user" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                    <!-- Display validation errors for the email field -->
                                    <div class="mt-2">
                                        @foreach($errors->get('email') as $error)
                                            <span>{{ $error }}</span><br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="new-password">
                                    <!-- Display validation errors for the password field -->
                                    <div class="mt-2">
                                        @foreach($errors->get('password') as $error)
                                            <span>{{ $error }}</span><br>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    <input id="password_confirmation" class="form-control form-control-user" type="password" name="password_confirmation" required autocomplete="new-password">
                                    <!-- Display validation errors for the password confirmation field -->
                                    <div class="mt-2">
                                        @foreach($errors->get('password_confirmation') as $error)
                                            <span>{{ $error }}</span><br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="custom-control small">
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('login')}}">
                                            Vous avez déjà un compte?
                                        </a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



