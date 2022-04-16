{{--Nav Aside--}}
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->

                <a class="font-w600 text-white tracking-wide" href="{{Route('page_Acceuil')}}">
                    <img class="headerImg" src = "{{asset('assets/media/photos/IVOIRJOB.png')}}">
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

                    @can('ActOnFichePoste')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{Route('ShowFichePostePage')}}">
                                <i class="nav-main-link-icon nav-icon fa  fa-briefcase"></i>
                                <span class="nav-main-link-name">Fiche de poste</span>
                            </a>
                        </li>
                    @endcan

                    @can('ActOnQuiz')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{Route('ShowQuizPage')}}">
                                <i class="nav-main-link-icon nav-icon fa fa-graduation-cap"></i>
                                <span class="nav-main-link-name">Quiz</span>
                            </a>
                        </li>
                    @endcan

                    @can('ActOnScheduleEntretien')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{Route('ShowScheduleEntretien')}}">
                                <i class="nav-main-link-icon nav-icon fa fa-video"></i>
                                <span class="nav-main-link-name">Entretien</span>
                            </a>
                        </li>
                    @endcan

                    @can('ActOnValidation')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{Route('Validation_Admin')}}">
                                <i class="nav-main-link-icon nav-icon fa fa-thumbs-up"></i>
                                <span class="nav-main-link-name">Validation</span>
                            </a>
                        </li>
                    @endcan

                    @can('ActOnProfilUsers')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{Route('ShowAllCandidates')}}">
                                <i class="nav-main-link-icon nav-icon fa fa-user-friends"></i>
                                <span class="nav-main-link-name">Profil</span>
                            </a>
                        </li>
                    @endcan

                    @can('ActOnSecurite')
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon nav-icon fa fa-lock"></i>
                                <span class="nav-main-link-name">Sécurité</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{Route('show_Admin_Group')}}">
                                        <span class="nav-main-link-name">Groupes</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{Route('Securite_acces_group_Admin')}}">
                                        <span class="nav-main-link-name">Accès</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                        @can('ActOnLogs')
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <i class="nav-main-link-icon nav-icon fa fa-clipboard-list"></i>
                                    <span class="nav-main-link-name">Logs</span>
                                </a>
                            </li>
                        @endcan

                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
{{--End Nav Aside--}}