<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IVOIRJOB | Entretien</title>
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/main_page_entretien.min.css')}}">
</head>
<body>
@auth('administrateur')
    <div id="page-container" class="side-scroll page-header-fixed main-content-narrow side-trans-enabled">

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <a class="font-w600 text-white tracking-wide" href="#">
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
                            {{Auth::user()->prenoms_Administrateur}} {{Auth::user()->nom_Administrateur}}
                        </div>
                    </div>
                    <button type="button" id="BouttonProfil" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="fa fa-2x fa-user-circle"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
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
                <div class="row justify-content-center">
                    <div  id="contentVisio"></div>
                </div>
                <div class="row justify-content-center d-flex align-items-center mt-3 mb-3">
                    <!-- Menu -->
                    <li class="nav-main-item">
                        <button type="button" class="btn btn-hero-success" data-toggle="modal" data-target="#modal-default-schedule_interview" >EVALUER LE CANDIDAT</button>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('ShowScheduleEntretien')}}">
                            <button type="button" class="btn btn-hero-danger">QUITTER LA PAGE</button>
                        </a>
                    </li>

                    <!-- END Menu -->
                </div>
                <div class="modal" id="modal-default-schedule_interview" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal-header-color">Noter le candidat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form class="js-validation-signup" action="{{Route('EvaluateCandidate',['id_suivi' => $suivi->id_Suivi])}}" method="post">
                                @csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        <div class="ml-sm-5 col-10">
                                            <label for="note_interview">Score / 20</label>
                                            <div class="input-group">
                                                <input class="form-control" type = "number" min = "0" max = "20" id="note_interview" name="Note_Interview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer row justify-content-center">
                                    <input type="submit" class="btn btn-hero-lg btn-hero-success" value="NOTER">
                                    <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
@endauth

<script src = "{{asset('assets/js/Deconnexion.js')}}"></script>
<script src='https://meet.jit.si/external_api.js'></script>
<script>
    const roomnameLink =  <?php echo json_encode($suivi); ?>;
    const domain = 'meet.jit.si';
    const options = {
        roomName: 'JitsiMeetIVOIRJOB/'+ roomnameLink['lien_Etape'],
        width: 1000,
        height: 590,
        parentNode: document.querySelector('#contentVisio')
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script>
<script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
<script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>



</body>
</html>