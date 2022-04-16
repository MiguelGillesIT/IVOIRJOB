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
                        <span class=" d-sm-inline-block">Se deconnecter</span>
                    </button>
                </a>
                <div class="font-w700" id="UserPrename">
                    {{Auth::user()->nom_Administrateur}} {{Auth::user()->prenoms_Administrateur}}
                </div>
            </div>
            <button type="button" id="BouttonProfil" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-2x fa-user-circle"></i>
            </button>
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
    <div class = "line-left"></div>
</header>