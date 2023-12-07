<!DOCTYPE html>
<html lang="fr">

    @include("pages.header")
    
    <body id="page-top">
        <div id="wrapper">
            @include("pages.sidebar")
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include("pages.topbar")
                    {{-- <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Bienvenue sur la page d'accueil</h1>
                        </div>
                    </div> 
                    
                    ici le nom de la pages--}}
                    @yield('content')
                </div>
                
                @include("pages.footer")
    
            </div>
        </div>
        @include("pages.import")
        @include("pages.logout")
    </body>
</html>