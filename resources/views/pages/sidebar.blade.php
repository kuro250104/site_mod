<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("home.home")}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-text mx-3" href="" >Zach System</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route("home.home")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu Principal</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dossier
    </div>
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Gestionnaire des équipes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion des équipes</h6>
                @can('user_manage')
                <a class="collapse-item" href="{{route('operator.index')}}">Gestion des opérateurs</a>
                <a class="collapse-item" href="{{route('team.index')}}">Gestion des équipes</a>
                @endcan()

                @if(Gate::any(['operator', 'finance_manage']))
                <a class="collapse-item" href="{{route('validated_hour.index')}}">Heures validées</a>
                @endif

{{--                <a class="collapse-item" href="{{route('validated_hour.table')}}">Heures validés</a>--}}
            </div>
        </div>
    </li>
    @can('production_manage', )
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-industry"></i>
            <span>Gestionnaire de production</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion de la production</h6>
                <a class="collapse-item" href="{{route("project.index")}}">Projets</a>
                @can('production_manage')
                <a class="collapse-item" href="{{route("task.index")}}">Taches</a>
                @endcan
                <a class="collapse-item" href={{route("stage.index")}}>Stades</a>
            </div>
        </div>
    </li>
    @endcan


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    </ul>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
