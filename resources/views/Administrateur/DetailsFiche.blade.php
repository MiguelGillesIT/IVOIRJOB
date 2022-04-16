@extends('layouts.Admin.base')

@section('Page_Title')
    Détails fiche
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_fiche.min.css')}}
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

            {{--Job offers--}}
                <div class="block block-rounded">
                    <div class="block block-rounded">

                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="{{Route('ShowFichePostePage')}}"><i class="fa fa-reply"> </i> Fiche</a>
                            </li>

                            @if(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$fichePoste->date_Limite_Candidature)->lt(today()))
                            <li class="nav-item ml-auto">
                                <a class="nav-link button-right" href="{{Route('SortSoumissions',['idFiche' =>  $fichePoste->id_Fiche])}}"><i class="fa fa-sort"> </i> Trier </a>
                            </li>
                            @endif
                        </ul>
                        <div class="block-content-new borderColor tab-content">
                            <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                                <div class="text-center row justify-content-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-center">
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Libellé : </span>{{$fichePoste->libelle_Fiche}}</div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Date limite de soumission : </span>{{$fichePoste->format_limite_date}}</div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Type d'offre : </span>{{$fichePoste->type_Offre}}</div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Etat du tri : </span>@if(isset($fichePoste->Soumissions[0]->suivis->etape_id))@if($fichePoste->Soumissions[0]->suivis->etape_id == "1") Trié @endif @else Non Trié @endif</div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nombre de candidats : </span>  {{$fichePoste->Soumissions->count()}} </div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nombre de candidats approuvés : </span> {{$nombreApprouves}} </div>
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nombre de candidats non approuvés :  </span> {{$nombreNonApprouves}} </div>
                                    </div>
                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 row mt-2 mb-2 justify-content-center text-justify">
                                        <span class="font-w700">Description : </span>{{$fichePoste->description_Fiche}}
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%;">
                                                N°
                                            </th>
                                            <th style="width: 35%;">Nom et prénoms Candidat</th>
                                            <th style="width: 20%;">Date de soumission</th>
                                            <th style="width: 25%;">Avis</th>
                                            <th class="text-center" style="width: 15%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fichePoste->Soumissions as $Soumission)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$Soumission->candidats->nom_Candidat}} {{$Soumission->candidats->prenoms_Candidat}}</td>
                                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $Soumission->date_Soumission)->format('d-m-Y')}}</td>
                                                <td>@if( isset($Soumission->suivis->etape_id) && isset($Soumission->suivis->validation_Etape)) @if($Soumission->suivis->etape_id == "1" && $Soumission->suivis->validation_Etape == "1")<span class="badge badge-success">Favorable</span>@elseif($Soumission->suivis->etape_id == "1" && $Soumission->suivis->validation_Etape == "0")<span class="badge badge-danger">Défavorable</span>@endif @else Non évalué @endif</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-show-candidate-details{{$loop->iteration}}"><i class="fa fa-info-circle"> </i></button>
                                                    @foreach($Soumission->candidats->documents as $document)
                                                        @if($document->type_Document == "CV")
                                                            <a href = {{Route('DownloadCandidateDocumentAdmin',['idDocument'  => $document->id_Document])}}><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-file-pdf"></i></button></a>
                                                        @endif
                                                        @if($document->type_Document == "LETTRE DE MOTIVATION")
                                                            <a href = {{Route('DownloadCandidateDocumentAdmin',['idDocument'  => $document->id_Document])}}><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-file-word"> </i></button></a>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @foreach($fichePoste->Soumissions as $Soumission)
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
                                                            <img class="img-avatar img-avatar150 img-avatar-thumb" @if(isset($Soumission->candidats->photo_Candidat )) src= "{{asset($Soumission->candidats->photo)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoCandidat">
                                                        </div>
                                                        <div class="col-10 row mt-2 mb-2  text-justify ml-auto">
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nom : </span>{{$Soumission->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Prénoms : </span>{{$Soumission->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nationalité : </span>{{$Soumission->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Sexe : </span>{{$Soumission->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Age : </span>{{$Soumission->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$Soumission->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">E-mail : </span>{{$Soumission->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$Soumission->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Téléphone : </span>{{$Soumission->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Permis : </span>{{$Soumission->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Numero de piece : </span>{{$Soumission->candidats->numero_Piece_Candidat}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center justify-content-center d-lg-none  px-4 d-flex">
                                                        <div class="col-12 row mt-2 mb-2  text-justify ">
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nom : </span>{{$Soumission->candidats->nom_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Prénoms : </span>{{$Soumission->candidats->prenoms_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nationalité : </span>{{$Soumission->candidats->nationalite_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Sexe : </span>{{$Soumission->candidats->sexe_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Age : </span>{{$Soumission->candidats->age}} ans</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$Soumission->candidats->lieu_Residence_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">E-mail : </span>{{$Soumission->candidats->e_mail_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$Soumission->candidats->situation_Matrimoniale_Candidat}}</div>
                                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Téléphone : </span>{{$Soumission->candidats->telephone_Candidat}}</div>
                                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Permis : </span>{{$Soumission->candidats->permis_Candidat}}</div>
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Numero de piece : </span>{{$Soumission->candidats->numero_Piece_Candidat}}</div>
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
                                                                @foreach($Soumission->candidats->certifications as $certifications)
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
                                                                @foreach($Soumission->candidats->formations as $formation)
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
                                                            @foreach($Soumission->candidats->competences as $competence)
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
                                                            @foreach($Soumission->candidats->experiences as $experience)
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
                                                            @foreach($Soumission->candidats->parles as $parle)
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
                </div>


        </div>
        <!-- END Page Content -->
    </main>
@endsection