    {{--Nav--}}
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->

                <a class="font-w600 text-white tracking-wide" href="{{Route('page_Acceuil')}}">
                    <img class="headerImg" src = "{{asset('assets/media/photos/IVOIRJOB.png')}}" alt = "Logo_IVOIRJOB">
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>

                <!-- END Options -->
            </div>
        </div>
        <div class = "line-right"></div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">

                    @can('ActOnDashboard')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{Route('Tableau_de_bord_candiat')}}">
                            <i class="nav-main-link-icon nav-icon fa  fa-tachometer-alt"></i>
                            <span class="nav-main-link-name">Tableau de bord</span>
                        </a>
                    </li>
                    @endcan

                    @can('ActOnSettings')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{Route('Parametres_candiat')}}">
                            <i class="nav-main-link-icon nav-icon fa fa-cog"></i>
                            <span class="nav-main-link-name">Paramètres</span>
                        </a>
                    </li>
                    @endcan

                    @can('ActOnProfile')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{Route('Profil_candiat')}}">
                            <i class="nav-main-link-icon nav-icon fa fa-user"></i>
                            <span class="nav-main-link-name">Profil</span>
                        </a>
                    </li>
                    @endcan

                    @can('ActOnJobOffers')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{Route('Offres_candiat')}}">
                            <i class="nav-main-link-icon nav-icon fa fa-briefcase"></i>
                            <span class="nav-main-link-name">Offres</span>
                        </a>
                    </li>
                     @endcan

                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    {{--End Nav--}}