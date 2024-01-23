
@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenue sur la page d'accueil</h1>
        </div>


        <div class="row">

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Heures validé</h6>
                    </div>
                    <div class="card-body">
                        Aller à la page des heures validés
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                        Aller à la pages des équipes
                    </div>
                </div>

            </div>

            <div class="col-lg-6">


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                        The styling for this basic card example is created by using default Bootstrap
                        utility classes. By using utility classes, the style of the card component can be
                        easily modified with no need for any custom CSS!
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                        The styling for this basic card example is created by using default Bootstrap
                        utility classes. By using utility classes, the style of the card component can be
                        easily modified with no need for any custom CSS!
                    </div>
                </div>

            </div>

        </div>
    </div>








@endsection
