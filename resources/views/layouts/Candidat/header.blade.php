
<!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-arrow-alt-circle-left"></i>
                </button>

            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <div class="dropdown d-inline-block">
                    <a href = "{{Route('DECONNEXION')}}">
                        <button type="button" id="BouttonDeconnexion" class="btn btn-hero-warning" style="display: block;">
                            <span class="d-sm-inline-block">Se deconnecter</span>
                        </button>
                    </a>
                    <div class="font-w700" id="UserPrename">
                        {{Auth::user()->prenoms_Candidat}} {{Auth::user()->nom_Candidat}}
                    </div>
                </div>
                <button type="button" id="BouttonProfil" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="fa fa-2x fa-user-circle"></i>
                </button>


                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>

        <div class = "line-left"></div>
    </header>
<!-- END Header -->