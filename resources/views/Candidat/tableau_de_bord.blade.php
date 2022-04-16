@extends('layouts.Candidat.base')

@section('Page_Title')
    Tableau de bord
@endsection

@section('css_file')
    {{asset('assets/css/main_page_tableau_de_bord.min.css')}}
@endsection

@section('Content')
    <main id="main-container">
        <!-- Hero -->
        <div>
            <div class="content content-full">
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            @if(session('ErrorFinParticipartion'))
                <div class="row justify-content-center">
                    <div class="alert alert-danger align-items-center ml-5 col-6 d-flex form-group text-align-center" role="alert">
                        <div class="flex-fill mr-3">
                            <p class="mb-0">{{session('ErrorFinParticipartion')}}</p>
                        </div>
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </div>
                    </div>
                </div>
            @elseif(session('ErrorParticipartion'))
                    <div class="row justify-content-center">
                        <div class="alert alert-danger align-items-center ml-5 col-4 d-flex form-group text-align-center" role="alert">
                            <div class="flex-fill mr-3">
                                <p class="mb-0">{{session('ErrorParticipartion')}}</p>
                            </div>
                            <div class="flex-00-auto">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </div>
                        </div>
                    </div>
            @endif
            @foreach($OffresSoumissions as $OffreSoumission)
                <div class="row">
                    <div class="col-md-12">
                        <!-- Simple Wizard 2 -->
                        <div class="js-wizard-simple block block block-rounded">
                            <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#wizard-simple2-step1{{$loop->iteration}}" data-toggle="tab">Offre d'emploi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-simple2-step2{{$loop->iteration}}" data-toggle="tab">Statuts  Progression</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-simple2-step4{{$loop->iteration}}" data-toggle="tab">Statut final</a>
                                </li>
                            </ul>
                            <!-- END Step Tabs -->

                            <!-- Form -->
                            <div>
                                <!-- Steps Content -->
                                <div class="block-content block-content-full tab-content" style="min-height: 240px;">
                                    <!-- Step 1 -->
                                    <div class="tab-pane active" id="wizard-simple2-step1{{$loop->iteration}}" role="tabpanel">
                                        <div class="row text-center font-w700 mt-2 mb-4">
                                            <div class="col-lg-1">N°{{$loop->iteration}}</div>
                                            <div class="col-lg-5">{{$OffreSoumission[0]->libelle_Fiche}}</div>
                                            <div class="col-lg-3">{{$OffreSoumission[0]->type_Offre}}</div>
                                            <div class="col-lg-3">{{$OffreSoumission[0]->format_limite_date}}</div>
                                        </div>
                                        <div class="row mr-4 ml-4 text-justify">{{$OffreSoumission[0]->description_Fiche}}</div>
                                    </div>
                                    <!-- END Step 1 -->

                                   @if(isset($OffreSoumission[1]))
                                       @if($OffreSoumission[1]->etape_id == "1")
                                        <div class="tab-pane" id="wizard-simple2-step2{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-justify" style="font-size:1.4rem">
                                                <div class="col-md-7  mt-4 mb-2 font-w600 text-center" >
                                                    Progression
                                                </div>
                                                <div class="progress push col-7">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="font-size-sm font-w600">35%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 text-center mt-4 font-w700">
                                                    ÉTAPE ACTUELLE : ÉTUDE DE LA CANDIDATURE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-simple2-step4{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-center" >
                                                <div class="mt-6 col-md-8 font-w700" style="font-size:1.7rem">
                                                    PROCESSUS EN COURS
                                                </div>
                                            </div>
                                        </div>
                                       @elseif($OffreSoumission[1]->etape_id == "2")
                                        <div class="tab-pane" id="wizard-simple2-step2{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-justify" style="font-size:1.4rem">
                                                <div class="col-md-7  mt-4 mb-2 font-w600 text-center" >
                                                    Progression
                                                </div>
                                                <div class="progress push col-7">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="font-size-sm font-w600">50%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 text-center mt-4 font-w700">
                                                    ÉTAPE ACTUELLE : QUIZ
                                                </div>
                                                <div class="col-md-7 text-center mt-1 font-w700">
                                                   Date limite de participation : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $OffreSoumission[1]->soumissions->Offres->Quiz->date_Limite_Quiz)->format('d-m-Y')}}
                                                </div>
                                                <div class="col-md-7 mb-2 mt-2 justify-content-center row">
                                                    <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('showQuiz',['linkQuiz' => $OffreSoumission[1]->lien_Etape ])}}">
                                                        <button type="button" class="btn btn-hero-success">LANCER LE QUIZ</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-simple2-step4{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-center" >
                                                <div class="mt-6 col-md-8 font-w700" style="font-size:1.7rem">
                                                    PROCESSUS EN COURS
                                                </div>
                                            </div>
                                        </div>
                                       @elseif($OffreSoumission[1]->etape_id == "3")
                                        <div class="tab-pane" id="wizard-simple2-step2{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-justify" style="font-size:1.4rem">
                                                <div class="col-md-7  mt-4 mb-2 font-w600 text-center" >
                                                    Progression
                                                </div>
                                                <div class="progress push col-7">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="font-size-sm font-w600">75%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 text-center mt-1 mb-1 font-w700">
                                                    ÉTAPE ACTUELLE : ENTRETIEN
                                                </div>
                                                <div class="col-md-7 text-center mt-1 mb-1 font-w700">
                                                    Date et Heure : {{$OffreSoumission[1]->date_Participation_Etape}}
                                                </div>
                                                <div class="col-md-7 mb-2 mt-2 justify-content-center row">
                                                    <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="{{Route('ParticipateToInterview', ['id_suivi' => $OffreSoumission[1]->id_Suivi])}}">
                                                        <button type="button" class="btn btn-hero-success">PARTICIPER Á L'ENTRETIEN</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-simple2-step4{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-center" >
                                                <div class="mt-6 col-md-8 font-w700" style="font-size:1.7rem">
                                                    PROCESSUS EN COURS
                                                </div>
                                            </div>
                                        </div>
                                       @elseif($OffreSoumission[1]->etape_id == "4")
                                        <div class="tab-pane" id="wizard-simple2-step2{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-justify" style="font-size:1.4rem">
                                                <div class="col-md-7  mt-4 mb-2 font-w600 text-center" >
                                                    Progression
                                                </div>
                                                <div class="progress push col-7">
                                                    @if($OffreSoumission[1]->validation_Etape)
                                                        <div class="progress-bar bg-success" role="progressbar" style="width:100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="font-size-sm font-w600">100%</span>
                                                        </div>
                                                    @else
                                                        <div class="progress-bar bg-success" role="progressbar" style="width:80%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="font-size-sm font-w600">80%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-7 text-center mt-4 font-w700">
                                                    ÉTAPE ACTUELLE : VALIDATION
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-simple2-step4{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-center" >
                                                <div class="mt-6 col-md-8 font-w700" style="font-size:1.7rem">
                                                    @if($OffreSoumission[1]->validation_Etape)
                                                    VOUS ETES ADMIS A ELITE CI BRAVO!!!
                                                    @else
                                                        PROCESSUS EN COURS
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @else
                                        <div class="tab-pane" id="wizard-simple2-step2{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-justify" style="font-size:1.4rem">
                                                <div class="col-md-7  mt-4 mb-2 font-w600 text-center" >
                                                    Progression
                                                </div>
                                                <div class="progress push col-7">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="font-size-sm font-w600">10%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 text-center mt-4 font-w700">
                                                    ÉTAPE ACTUELLE : SOUMISSION À LA FICHE DE POSTE
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-simple2-step4{{$loop->iteration}}" role="tabpanel">
                                            <div class="justify-content-center row text-center" >
                                                <div class="mt-6 col-md-8 font-w700" style="font-size:1.7rem">
                                                    PROCESSUS EN COURS
                                                </div>
                                            </div>
                                        </div>
                                   @endif
                                    <!-- Step 2 -->

                                    <!-- END Step 3 -->
                                </div>
                                <!-- END Steps Content -->

                                <!-- Steps Navigation -->
                                <!-- END Steps Navigation -->
                            </div>
                            <!-- END Form -->
                        </div>
                        <!-- END Simple Wizard 2 -->
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END Page Content -->
    </main>
@endsection