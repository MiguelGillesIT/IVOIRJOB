@extends('layouts.Admin.base')

@section('Page_Title')
    Entretien
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_entretien.min.css')}}
@endsection


@section('ContentAdmin')

        <main id="main-container">
            <!-- Hero -->
            <div>
                <div class="content content-full">
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                @foreach($fiches as $fiche)
                    <div class="block block-rounded">
                    <div class="block block-rounded">
                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="#">Fiche N°{{$loop->iteration}}</a>
                            </li>
                        </ul>
                        <div class="block-header block-header-default borderColorTop">
                            <div class="text-center row justify-content-center">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-start">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Libellé de la fiche : </span>{{$fiche->libelle_Fiche}}</div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Intitulé du Quiz : </span>@if(isset($fiche->Quiz->intitule_Quiz)){{$fiche->Quiz->intitule_Quiz}}@endif</div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Score minimal : </span>@if(isset($fiche->Quiz->score_Minimal_Quiz)){{$fiche->Quiz->score_Minimal_Quiz}}@endif</div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Date limite du quiz : </span>@if(isset($fiche->Quiz->date_Limite_Quiz)){{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fiche->Quiz->date_Limite_Quiz)->format('d-m-Y')}}@endif</div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content-full borderColorBottom tab-content">
                            <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_0_wrapper">

                                <div class = "row ">
                                    <div class="table-responsive">
                                        <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_{{$loop->iteration}}" role = "grid" aria-describedby = "DataTables_Table_{{$loop->iteration}}_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="text-center sorting" style="width: 5%;" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                                <th class="sorting" style="width: 20%;"  tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Nom et Prénoms du Candidat: activate to sort column ascending">Nom et Prénoms du Candidat</th>
                                                <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Score au Quiz: activate to sort column ascending">Score au Quiz</th>
                                                <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Date et heure de l'entretien: activate to sort column ascending">Date et heure de l'entretien</th>
                                                <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Note de l'entretien: activate to sort column ascending">Note de l'entretien</th>
                                                <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Avis: activate to sort column ascending">Avis</th>
                                                <th class="text-center" style="width: 25%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_{{$loop->iteration}}" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($fiche->SuivisQuiz as $SuiviQuiz)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$SuiviQuiz->soumissions->candidats->nom_Candidat}} {{$SuiviQuiz->soumissions->candidats->prenoms_Candidat}}</td>
                                                    <td>{{$SuiviQuiz->Score_Etape}}</td>
                                                    <td>@if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]->date_Participation_Etape)){{$SuiviQuiz->soumissions->SuiviEntretien[0]->date_Participation_Etape}} @else Non Programmé @endif</td>
                                                    <td>@if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]->Score_Etape)){{$SuiviQuiz->soumissions->SuiviEntretien[0]->Score_Etape}}@else Non Evalué @endif</td>
                                                    <td>@if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]->validation_Etape) && isset($SuiviQuiz->soumissions->SuiviEntretien[0]->Score_Etape))@if($SuiviQuiz->soumissions->SuiviEntretien[0]->validation_Etape)<span class="badge badge-success">Favorable</span>  @else<span class="badge badge-danger">Non favorable</span> @endif @endif</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-show-candidate-details{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-info-circle"> </i></button>
                                                        <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-schedule_interview{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-calendar-alt"> </i></button>
                                                        @if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]))<a href = "{{Route('ParticipateTOinterview',[ 'id_suivi' => $SuiviQuiz->soumissions->SuiviEntretien[0]->id_Suivi ])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-"><i class="fa fa-video"> </i></button></a>@endif
                                                        @if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]->Score_Etape))<a href = "{{Route('ApproveCandidate',[ 'id_suivi' => $SuiviQuiz->soumissions->SuiviEntretien[0]->id_Suivi ])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-success" data-toggle="modal" data-target="#modal-default-agree1"><i class="fa fa-thumbs-up"> </i></button></a>@endif
                                                        @if(isset($SuiviQuiz->soumissions->SuiviEntretien[0]->Score_Etape))<a href = "{{Route('DisapproveCandidate',[ 'id_suivi' => $SuiviQuiz->soumissions->SuiviEntretien[0]->id_Suivi ])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-danger" data-toggle="modal" data-target="#modal-default-agree1"><i class="fa fa-thumbs-down"> </i></button></a>@endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--Modify a job offer-->
                                @foreach($fiche->SuivisQuiz as $SuiviQuiz)
                                    <div class="modal" id="modal-default-show-candidate-details{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-extra-large" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Informations du candidat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pb-1 row justify-content-center">

                                                    <h2> État civil </h2>
                                                    <div class="row text-center justify-content-center d-none  px-4 d-lg-flex">
                                                        <div class="col-1">
                                                            <img class="img-avatar img-avatar150 img-avatar-thumb" @if(isset($SuiviQuiz->soumissions->candidats->photo_Candidat )) src= "{{asset($SuiviQuiz->soumissions->candidats->photo)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoCandidat">
                                                        </div>
                                                        <div class="col-10 row mt-2 mb-2  text-justify ml-auto">
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nom : </span>{{$SuiviQuiz->soumissions->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Prénoms : </span>{{$SuiviQuiz->soumissions->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nationalité : </span>{{$SuiviQuiz->soumissions->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Sexe : </span>{{$SuiviQuiz->soumissions->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Age : </span>{{$SuiviQuiz->soumissions->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$SuiviQuiz->soumissions->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">E-mail : </span>{{$SuiviQuiz->soumissions->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$SuiviQuiz->soumissions->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Téléphone : </span>{{$SuiviQuiz->soumissions->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Permis : </span>{{$SuiviQuiz->soumissions->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Numero de piece : </span>{{$SuiviQuiz->soumissions->candidats->numero_Piece_Candidat}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center justify-content-center d-lg-none  px-4 d-flex">
                                                        <div class="col-12 row mt-2 mb-2  text-justify ">
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nom : </span>{{$SuiviQuiz->soumissions->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Prénoms : </span>{{$SuiviQuiz->soumissions->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nationalité : </span>{{$SuiviQuiz->soumissions->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Sexe : </span>{{$SuiviQuiz->soumissions->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Age : </span>{{$SuiviQuiz->soumissions->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$SuiviQuiz->soumissions->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">E-mail : </span>{{$SuiviQuiz->soumissions->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$SuiviQuiz->soumissions->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Téléphone : </span>{{$SuiviQuiz->soumissions->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Permis : </span>{{$SuiviQuiz->soumissions->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Numero de piece : </span>{{$SuiviQuiz->soumissions->candidats->numero_Piece_Candidat}}</div>
                                                        </div>
                                                    </div>

                                                    <h2> Certifications </h2>
                                                    <div class="table-responsive px-4 mb-5">
                                                        <table class="table table-bordered table-striped table-vcenter">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 5%;">N°</th>
                                                                <th style="width: 25%;">Organisation</th>
                                                                <th style="width: 25%;">Certification</th>
                                                                <th style="width: 20%;">Date de début</th>
                                                                <th style="width: 20%;">Date de fin</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($SuiviQuiz->soumissions->candidats->certifications as $certifications)
                                                                <tr>
                                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                                    <td>{{$certifications->organisation_Certification}}</td>
                                                                    <td>{{$certifications->intitule_Certification}}</td>
                                                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $certifications->date_Debut_Certification)->format('d-m-Y')}}</td>
                                                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $certifications->date_Fin_Certification)->format('d-m-Y')}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h2> Formations </h2>
                                                    <div class="table-responsive px-4 mb-5">
                                                        <table class="table table-bordered table-striped table-vcenter">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 10%;">N°</th>
                                                                <th style="width: 15%;">Intitulé</th>
                                                                <th style="width: 20%;">Établissement</th>
                                                                <th style="width: 15%;">Diplôme</th>
                                                                <th style="width: 20%;">Lieu</th>
                                                                <th style="width: 10%;">Date de début</th>
                                                                <th style="width: 10%;">Date de fin</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($SuiviQuiz->soumissions->candidats->formations as $formation)
                                                                <tr>
                                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                                    <td>{{$formation->intitule_Formation}}</td>
                                                                    <td>{{$formation->etablissement_Formation}}</td>
                                                                    <td>{{$formation->diplome_Formation}}</td>
                                                                    <td>{{$formation->lieu_Formation}}</td>
                                                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $formation->date_Debut_Formation)->format('d-m-Y')}}</td>
                                                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $formation->date_Fin_Formation)->format('d-m-Y')}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h2> Competence </h2>
                                                    <div class="table-responsive px-4 mb-5">
                                                        <table class="table table-bordered table-striped table-vcenter">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 10%;">N°</th>
                                                                <th style="width: 30%;">Libellé</th>
                                                                <th style="width: 60%;">Description</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($SuiviQuiz->soumissions->candidats->competences as $competence)
                                                                <tr>
                                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                                    <td>{{$competence->libelle_Competence}}</td>
                                                                    <td>{{$competence->description_Competence}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h2> Expériences professionnelles </h2>
                                                    <div class="table-responsive px-4 mb-5">
                                                        <table class="table table-bordered table-striped table-vcenter">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 5%;">N°</th>
                                                                <th style="width: 10%;">Poste occupé</th>
                                                                <th style="width: 10%;">Nom de l'entreprise</th>
                                                                <th style="width: 10%;">Lieu</th>
                                                                <th style="width: 5%;">Type de contrat</th>
                                                                <th style="width: 10%;">Description</th>
                                                                <th style="width: 10%;">Tâches réalisées</th>
                                                                <th style="width: 10%;">Secteur d'activité</th>
                                                                <th style="width: 15%;">Date de début</th>
                                                                <th style="width: 15%;">Date de fin</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($SuiviQuiz->soumissions->candidats->experiences as $experience)
                                                                <tr>
                                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                                    <td>{{$experience->poste_Occupe_Experience}}</td>
                                                                    <td>{{$experience->nom_Entreprise_Experience}}</td>
                                                                    <td>{{$experience->lieu_Travail_Experience}}</td>
                                                                    <td>{{$experience->type_Contrat_Experience}}</td>
                                                                    <td>{{$experience->description_Experience}}</td>
                                                                    <td>{{$experience->taches_Realisees_Experience}}</td>
                                                                    <td>{{$experience->secteur_Experience}}</td>
                                                                    <td>{{$experience->debutExperienceProfessionnelle}}</td>
                                                                    <td>{{$experience->finExperienceProfessionnelle}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h2> Langues </h2>
                                                    <div class="table-responsive px-4 mb-5">
                                                        <table class="table table-bordered table-striped table-vcenter">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 10%;">N°</th>
                                                                <th style="width: 30%;">Référence</th>
                                                                <th style="width: 40%;">Niveau</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($SuiviQuiz->soumissions->candidats->parles as $parle)
                                                                @if($parle->statut_Langue)
                                                                    <tr>
                                                                        <td class="text-center">{{$loop->iteration}}</td>
                                                                        <td>{{$parle->langues->reference_Langue}}</td>
                                                                        <td>{{$parle->niveau_Langue}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="modal-footer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="modal-default-schedule_interview{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Programmer l'entretien</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="js-validation-signup" action="{{Route('ScheduleEntretien',['idSoumission' => $SuiviQuiz->soumission_id])}}" method="post">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorScheduleEntretien->first('Schedule_interview'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorScheduleEntretien->first('Schedule_interview')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="schedule_interview{{$loop->iteration}}">Date et heure de l'entretien</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type = "datetime-local" id="schedule_interview{{$loop->iteration}}" name="Schedule_interview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value="PROGRAMMER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <!--End Modify a job offer-->

                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <!-- END Page Content -->
        </main>



@endsection
