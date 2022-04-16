<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <title>IVOIRJOB | ACCUEIL</title>
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/landing_page.min.css')}}">


</head>
<body>

<div id="page-container" class="page-header-fixed page-header-glass main-content-boxed">

    <!-- Header -->
    <header id="page-header" class="invisible" data-toggle="appear" data-class="animated fadeIn" data-timeout="500">
        <!-- Header Content -->
        <div class="content-header justify-content-center justify-content-lg-between">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <a class="font-size-lg font-w600 text-dark" href="{{Route('page_Acceuil')}}">
                    <img class="imgHeader" src="{{asset('assets/media/photos/IVOIRJOB.png')}}" alt="logoIVOIRJOB">
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="d-none d-lg-flex align-items-center">
                <!-- Menu -->
                <ul class="nav-main nav-main-horizontal nav-main-hover">
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('Show_inscription_candiat')}}">
                            <button type="button" class="btn btn-hero-warning">INSCRIPTION</button>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('Show_connexion_candiat')}}">
                            <button type="button" class="btn btn-hero-success">CONNEXION</button>
                        </a>
                    </li>
                </ul>
                <!-- END Menu -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-hero-success" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->

    </header>
    <!-- END Header -->
    <div class="line-left"></div>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-white overflow-hidden">
            <div class="content content-top text-md-center mt-5">
                <div class="d-lg-none row justify-content-center d-flex align-items-center mt-3 mb-3">
                    <!-- Menu -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('Show_inscription_candiat')}}">
                                <button type="button" class="btn btn-hero-warning">INSCRIPTION</button>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('Show_connexion_candiat')}}">
                                <button type="button" class="btn btn-hero-success">CONNEXION</button>
                            </a>
                        </li>
                    <!-- END Menu -->
                </div>
                @if(empty($formatFiches[0]))
                    <div class="row justify-content-center">
                            <div class="col-md-5 pt-8 pb-10 font-w700">
                                LES OFFRES SONT INDISPONIBLES POUR LE MOMENT
                            </div>
                    </div>
<<<<<<< HEAD
                @else
                    <form method = "post" action = "{{Route('ShowLandingPageRetrieve')}}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                                <select class="form-control" id="example-select" name="type_offre">
                                    <option value="AUCUN">Type d'offre</option>
                                    <option value="CDD">CDD</option>
                                    <option value="CDI">CDI</option>
                                    <option value="STAGE">STAGE</option>
                                </select>
                            </div>
                            <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                                <input type="date" class="form-control" placeholder="date_limite" name="date_limite_de_soumission" min="now">
                            </div>
                            <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="example-group2-input2" placeholder="Rechercher une offre" name="recherche_offre">
                                </div>
                            </div>
                            <div class="col-3 col-md-1 col-xl-1 col-sm-1 col-lg-1 mt-2">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-hero-success"><span><i class="fa fa-search mr-1"></i></span></button>
                                </div>
                            </div>
=======
                </form>
                <div class=" pt-4 pt-lg-5 text-center">
                    <h1 class="font-w800 mb-2 title">
                        Retrouvez votre offre d'emploi
                    </h1>
                </div>
                <div class="row justify-content-center">
                @if(!empty($formatFiches))
                    @foreach($formatFiches as $fiches)
                                    <div class="col-md-5">
                                        <div class="block block-rounded">
                                            <div class="block-content">
                                                <h3 class="font-w700"> {{$fiches->libelle_Fiche}} </h3>
                                                <h5 class="font-w700">Date limite de soumission : {{$fiches->format_limite_date}} </h5>
                                                <h5 class="font-w700">Type de contrat : {{$fiches->type_Offre}} </h5>
                                                <p class="font-w600 text-justify">{{$fiches->description_Fiche}}</p>
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                 @endif
>>>>>>> ea48bde242cea1a914dd00fc41c6ffe7589315a5
                        </div>
                    </form>
                    <div class=" pt-4 pt-lg-5 text-center">
                        <h1 class="font-w800 mb-2 title">
                            Retrouvez votre offre d'emploi
                        </h1>
                    </div>
                    <div class="row justify-content-center">
                            @foreach($formatFiches as $fiches)
                                            <div class="col-md-5">
                                                <div class="block block-rounded">
                                                    <div class="block-content">
                                                        <h3 class="font-w700"> {{$fiches->libelle_Fiche}} </h3>
                                                        <h5 class="font-w700">Date limite de soumission : {{$fiches->format_limite_date}} </h5>
                                                        <h5 class="font-w700">Type de contrat : {{$fiches->type_Offre}} </h5>
                                                        <p class="font-w600 text-justify">{{$fiches->description_Fiche}}</p>
                                                    </div>
                                                </div>
                                            </div>
                            @endforeach

                    </div>
                    <div class="row justify-content-center plusButton mb-7">
                        <a href="{{Route('Show_connexion_candiat')}}">
                            <button type="button" class="btn btn-hero-warning">PLUS</button>
                        </a>
                    </div>
                @endif
        </div>
        <!-- END Hero -->



        </div>
    </main>
    <!-- END Main Container -->
</div>

<script src="assets/js/dashmix.core.min.js"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="assets/js/dashmix.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

</body>
</html>
