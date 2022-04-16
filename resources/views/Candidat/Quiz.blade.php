<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>IVOIRJOB | QUIZ</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/NoCopy.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/Quiz.min.css')}}">
    <script src = "{{asset('assets/js/NoCopy.js')}}"></script>


</head>
<body>
    @auth('candidat')
        <div id="page-container" class="side-scroll page-header-fixed main-content-narrow side-trans-enabled">



            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <a class="font-w600 headerImglink text-white tracking-wide" href="#">
                            <img class="headerImg" src="{{asset('assets/media/photos/IVOIRJOB.png')}}">
                        </a>

                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <div class="dropdown d-inline-block">
                            <a href = "{{Route('DECONNEXION')}}">
                                <button type="button" id="BouttonDeconnexion" class="btn btn-hero-danger" style="display: none;">
                                    <span class="d-none d-sm-inline-block">Se deconnecter</span>
                                </button>
                            </a>
                            <div class="font-w700" id="UserPrename">
                                {{Auth::user()->prenoms_Candidat}}   {{Auth::user()->nom_Candidat}}
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
                            <form class="w-100" action="#" method="post">
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

            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div>
                    <div class="content content-full">
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    <div class="row ">
                        <div class="col-md-12 ">
                            <!-- Progress Wizard -->
                            <div class="js-wizard-simple block block-rounded" id = "no-copy">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                                    @foreach($Quiz->parties as $partie)
                                            <li class="nav-item">
                                                <p class="nav-link @if($loop->iteration == 1)active @endif">Partie {{$loop->iteration}}</p>
                                            </li>
                                    @endforeach
                                </ul>

                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form action="{{Route('SendQuiz',['idQuiz' => $Quiz->id_Quiz])}}" method="post">
                                    <!-- Steps Content -->
                                    @csrf

                                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">

                                        @foreach($Quiz->parties as $partie)
                                            <div class="tab-pane @if($loop->iteration == 1)active @endif" id="partie{{$loop->iteration}}" role="tabpanel">
                                                <div class = "Questionclass active">
                                                    <div class="row justify-content-center text-center">
                                                        <div class="mt-5 row justify-content-end">
                                                            <div class="col-lg-1 col-2 col-md-1 col-sm-1 timer font-w500 class" style="font-size:1rem">
                                                                00:20
                                                            </div>
                                                        </div>
                                                        <div class="col-10 col-sm-10 col-md-10 mb-3 col-lg-10 font-w600 text-center" style="font-size:1.2rem">
                                                            {{$partie->libelle_Partie}}
                                                        </div>
                                                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 mt-6 font-w600 text-center" style="font-size:1.2rem">
                                                            {{$partie->description_Partie}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($partie->questions as $question)
                                                        <div class = "Questionclass">
                                                            <div class="mt-3 row justify-content-end">
                                                                <div class="col-lg-1 col-2 col-md-1 col-sm-1 timer font-w500 justify-content-end class" style="font-size:1rem">
                                                                    {{$question->duree_Question}}
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center text-center">
                                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 font-w600 text-center" style="font-size:1.2rem">
                                                                    {{$loop->iteration}}-  {{$question->libelle_Question}}
                                                                </div>
                                                            </div>
                                                             <div class="row mt-3 mb-5 justify-content-center">@if(isset($question->photo_Question))<img class="col-9 col-md-4 col-lg-4 col-sm-6 imgQuestion" src="{{asset($question->CheminPhotoQuestion)}}">@endif</div>
                                                            <div class="ml-2 ml-sm-5 ml-md-7 ml-lg-7 @if(isset($question->propositions[0]->photo_Proposition)) row justify-content-center @endif"> <!--When pictures are available add those classes-->
                                                                @foreach($question->propositions as $proposition)
                                                                    <div class="form-group">
                                                                        <div class="custom-checkbox custom-control custom-control-inline custom-control-lg mt-1 mb-1">
                                                                            <input type="checkbox" class="custom-control-input" id="{{$proposition->id_Proposition}}" name="{{$proposition->id_Proposition}}" value = {{Str::replace(' ','_',$proposition->reponse)}}>
                                                                            <label class="custom-control-label" for="{{$proposition->id_Proposition}}">{{$loop->iteration}}/  @if(isset($proposition->photo_Proposition))<img class="imgLabel" src="{{asset($proposition->CheminPhotoProposition)}}"> @else{{$proposition->reponse}}@endif</label><!--When pictures are available add this element-->
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                        <div class="row text-right">
                                            <div class="col-12">
                                                <button type="button" id = "bouttonSuivant" class="btn btn-hero-sm btn-hero-Quiz">Suivant <i class="fa fa-arrow-right"></i></button>
                                                <input type = "submit" id = "Soumettre" class="ml-auto btn btn-hero-sm btn-hero-Quiz" value = "Envoyer">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div>
                            <!-- END Progress Wizard -->
                        </div>
                    </div>
                </div>


                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
    @endauth
<script src = "{{asset('assets/js/Deconnexion.js')}}"></script>
<script src = "{{asset('assets/js/Decompte.js')}}"></script>
<script src = "{{asset('assets/js/dashmix.core.min.js')}}"></script>
<script src = "{{asset('assets/js/dashmix.app.min.js')}}"></script>



</body>
</html>