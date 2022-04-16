@extends('layouts.Admin.base')

@section('Page_Title')
    Validation
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_validation.min.css')}}
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
                            <div class="block-content-new borderColor tab-content">
                                <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                                    <div class="text-center row justify-content-center">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-justify">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Libellé : </span>{{$fiche->libelle_Fiche}}</div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Date limite de soumission : </span>{{$fiche->format_limite_date}} </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%;">
                                                    N°
                                                </th>
                                                <th style="width: 20%;">Nom du Candidat</th>
                                                <th style="width: 25%;">Prénoms du Candidat</th>
                                                <th style="width: 30%;">Statut processus</th>
                                                <th class="text-center" style="width: 15%;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($fiche->SuivisEntretien as $suiviEntretien)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$suiviEntretien->soumissions->candidats->nom_Candidat}}</td>
                                                    <td>{{$suiviEntretien->soumissions->candidats->prenoms_Candidat}}</td>
                                                    <td>@if(isset($suiviEntretien->soumissions->SuiviValidation)) @if($suiviEntretien->soumissions->SuiviValidation->validation_Etape)<span class="badge badge-success">Favorable pour adhésion</span> @else <span class="badge badge-danger">Défavorable pour adhésion</span>   @endif @else Aucun @endif</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-show-candidate-details{{$loop->iteration}}"><i class="fa fa-info-circle"> </i></button>
                                                        <a href = {{Route('ApproveAdmissionCandidate', [$suiviEntretien->soumissions->id_Soumission])}}><button type="button" class="btn btn-sm btn-rounded btn-hero-success" data-toggle="modal" data-target="#modal-default-agree1"><i class="fa fa-thumbs-up"> </i></button></a>
                                                        <a href = {{Route('DisapproveAdmissionCandidate', [$suiviEntretien->soumissions->id_Soumission])}}><button type="button" class="btn btn-sm btn-rounded btn-hero-danger" data-toggle="modal" data-target="#modal-default-agree1"><i class="fa fa-thumbs-down"> </i></button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    @foreach($fiche->SuivisEntretien as $suiviEntretien)
                                        <div class="modal" id="modal-default-show-candidate-details{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-extra-large" style="display: none;" aria-hidden="true">
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
                                                            <img class="img-avatar img-avatar150 img-avatar-thumb" @if(isset($suiviEntretien->soumissions->candidats->photo_Candidat )) src= "{{asset($suiviEntretien->soumissions->candidats->photo)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoCandidat">
                                                        </div>
                                                        <div class="col-10 row mt-2 mb-2  text-justify ml-auto">
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nom : </span>{{$suiviEntretien->soumissions->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Prénoms : </span>{{$suiviEntretien->soumissions->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nationalité : </span>{{$suiviEntretien->soumissions->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Sexe : </span>{{$suiviEntretien->soumissions->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Age : </span>{{$suiviEntretien->soumissions->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$suiviEntretien->soumissions->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">E-mail : </span>{{$suiviEntretien->soumissions->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$suiviEntretien->soumissions->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Téléphone : </span>{{$suiviEntretien->soumissions->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Permis : </span>{{$suiviEntretien->soumissions->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Numero de piece : </span>{{$suiviEntretien->soumissions->candidats->numero_Piece_Candidat}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center justify-content-center d-lg-none  px-4 d-flex">
                                                        <div class="col-12 row mt-2 mb-2  text-justify ">
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nom : </span>{{$suiviEntretien->soumissions->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Prénoms : </span>{{$suiviEntretien->soumissions->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nationalité : </span>{{$suiviEntretien->soumissions->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Sexe : </span>{{$suiviEntretien->soumissions->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Age : </span>{{$suiviEntretien->soumissions->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$suiviEntretien->soumissions->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">E-mail : </span>{{$suiviEntretien->soumissions->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$suiviEntretien->soumissions->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Téléphone : </span>{{$suiviEntretien->soumissions->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Permis : </span>{{$suiviEntretien->soumissions->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Numero de piece : </span>{{$suiviEntretien->soumissions->candidats->numero_Piece_Candidat}}</div>
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
                                                            @foreach($suiviEntretien->soumissions->candidats->certifications as $certifications)
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
                                                            @foreach($suiviEntretien->soumissions->candidats->formations as $formation)
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
                                                            @foreach($suiviEntretien->soumissions->candidats->competences as $competence)
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
                                                            @foreach($suiviEntretien->soumissions->candidats->experiences as $experience)
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
                                                            @foreach($suiviEntretien->soumissions->candidats->parles as $parle)
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
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END Page Content -->
        </main>
@endsection