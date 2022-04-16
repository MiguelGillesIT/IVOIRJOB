@extends('layouts.Admin.base')

@section('Page_Title')
   Candidats
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_profil.min.css')}}
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
        <div class="content ">
            <!-- Table Admins -->
            <h3 class="text-center">ADMINISTRATEURS</h3>
            <div class="block block-rounded">
                <div class="block block-rounded">
                    <div class="block-content-full borderColorBottom tab-content">
                        <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_1_wrapper">

                            <div class = "row ">
                                <div class="table-responsive">
                                    <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_1" role = "grid" aria-describedby = "DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting" style="width: 5%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                            <th class="sorting" style="width: 35%;"  tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Nom et Prénoms du Candidat: activate to sort column ascending">Nom et Prénoms</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Service: activate to sort column ascending">Service</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Date d'inscription: activate to sort column ascending">Date d'enregistrement</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Etat du compte: activate to sort column ascending">Etat du compte</th>
                                            <th class="text-center" style="width: 5%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Administrateurs as $Administrateur)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$Administrateur->nom_Administrateur}} {{$Administrateur->prenoms_Administrateur}}</td>
                                                <td>{{$Administrateur->e_mail_Administrateur}}</td>
                                                <td>{{$Administrateur->service_Administrateur}}</td>
                                                <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$Administrateur->created_at)->format('d-m-Y')}}</td>
                                                <td>@if($Administrateur->statut_Administrateur)<span class="badge badge-danger">Bloqué</span>@else<span class="badge badge-success">Debloqué</span> @endif</td>
                                                <td class="text-center">
                                                    @if($Administrateur->statut_Administrateur)<a href="{{Route('LockAdmin', ['idAdmin' =>  $Administrateur->id_Administrateur])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock-open"></i></button></a>
                                                    @else<a href="{{Route('UnlockAdmin', ['idAdmin' =>  $Administrateur->id_Administrateur])}}"> <button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock"> </i></button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Table Admins End -->
        </div>

        <div class="content">
            <!-- Table Recrutment Agent -->
            <h2 class="text-center">RECRUTEURS</h2>
            <div class="block block-rounded">
                <div class="block block-rounded">
                    <div class="block-content-full borderColorBottom tab-content">
                        <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_2_wrapper">

                            <div class = "row ">
                                <div class="table-responsive">
                                    <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_2" role = "grid" aria-describedby = "DataTables_Table_2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting" style="width: 5%;" tabindex="2" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                            <th class="sorting" style="width: 35%;"  tabindex="1" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Nom et Prénoms du Candidat: activate to sort column ascending">Nom et Prénoms</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Service: activate to sort column ascending">Service</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="1" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Date d'inscription: activate to sort column ascending">Date d'enregistrement</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Etat du compte: activate to sort column ascending">Etat du compte</th>
                                            <th class="text-center" style="width: 5%;" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Recruteurs as $Recruteur)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$Recruteur->nom_Administrateur}} {{$Recruteur->prenoms_Administrateur}}</td>
                                                <td>{{$Recruteur->e_mail_Administrateur}}</td>
                                                <td>{{$Recruteur->service_Administrateur}}</td>
                                                <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$Recruteur->created_at)->format('d-m-Y')}}</td>
                                                <td>@if($Recruteur->statut_Administrateur)<span class="badge badge-danger">Bloqué</span>@else<span class="badge badge-success">Debloqué</span> @endif</td>
                                                <td class="text-center">
                                                    @if($Recruteur->statut_Administrateur)<a href="{{Route('LockAdmin', ['idAdmin' =>  $Recruteur->id_Administrateur])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock-open"></i></button></a>
                                                    @else<a href="{{Route('UnlockAdmin', ['idAdmin' =>  $Recruteur->id_Administrateur])}}"> <button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock"> </i></button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Table Recrutment Agent -->
        </div>

        <div class="content">
            <h2 class="text-center">VALIDATEURS</h2>
            <!-- Table Recrutment Agent -->
            <div class="block block-rounded">
                <div class="block block-rounded">
                    <div class="block-content-full borderColorBottom tab-content">
                        <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_3_wrapper">

                            <div class = "row ">
                                <div class="table-responsive">
                                    <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_3" role = "grid" aria-describedby = "DataTables_Table_3_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting" style="width: 5%;" tabindex="3" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                            <th class="sorting" style="width: 35%;"  tabindex="1" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Nom et Prénoms du Candidat: activate to sort column ascending">Nom et Prénoms</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Service: activate to sort column ascending">Service</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Date d'inscription: activate to sort column ascending">Date d'enregistrement</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Etat du compte: activate to sort column ascending">Etat du compte</th>
                                            <th class="text-center" style="width: 5%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Validateurs as $Validateur)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$Validateur->nom_Administrateur}} {{$Validateur->prenoms_Administrateur}}</td>
                                                <td>{{$Validateur->e_mail_Administrateur}}</td>
                                                <td>{{$Validateur->service_Administrateur}}</td>
                                                <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$Validateur->created_at)->format('d-m-Y')}}</td>
                                                <td>@if($Validateur->statut_Administrateur)<span class="badge badge-danger">Bloqué</span>@else<span class="badge badge-success">Debloqué</span> @endif</td>
                                                <td class="text-center">
                                                    @if($Validateur->statut_Administrateur)<a href="{{Route('LockAdmin', ['idAdmin' =>  $Validateur->id_Administrateur])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock-open"></i></button></a>
                                                    @else<a href="{{Route('UnlockAdmin', ['idAdmin' =>  $Validateur->id_Administrateur])}}"> <button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock"> </i></button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Table Recrutment Agent -->
        </div>

        <div class="content">
            <!-- Table candidate -->
            <h2 class="text-center">CANDIDATS</h2>
            <div class="block block-rounded">
                <div class="block block-rounded">
                    <div class="block-content-full borderColorBottom tab-content">
                        <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_3_wrapper">

                            <div class = "row ">
                                <div class="table-responsive">
                                    <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_3" role = "grid" aria-describedby = "DataTables_Table_3_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting" style="width: 5%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                            <th class="sorting" style="width: 25%;"  tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Nom et Prénoms du Candidat: activate to sort column ascending">Nom et Prénoms</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 20%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Date d'inscription: activate to sort column ascending">Date d'inscription</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Etat du compte: activate to sort column ascending">Etat du compte</th>
                                            <th class="text-center" style="width: 20%;" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Candidats as $candidat)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$candidat->nom_Candidat}} {{$candidat->prenoms_Candidat}}</td>
                                            <td>{{$candidat->e_mail_Candidat}}</td>
                                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$candidat->created_at)->format('d-m-Y')}}</td>
                                            <td>@if($candidat->statut_Candidat)<span class="badge badge-danger">Bloqué</span>@else<span class="badge badge-success">Debloqué</span> @endif</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-show-candidate-details{{$loop->iteration}}"><i class="fa fa-info-circle"> </i></button>
                                                @if($candidat->statut_Candidat)<a href="{{Route('LockCandidate', ['idCandidate' =>  $candidat->id_Candidat])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock-open"></i></button></a>
                                                @else<a href="{{Route('UnlockCandidate', ['idCandidate' =>  $candidat->id_Candidat])}}"> <button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-lock"> </i></button></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @foreach($Candidats as $candidat)
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
                                            <img class="img-avatar img-avatar150 img-avatar-thumb" @if(isset($candidat->photo_Candidat )) src= "{{asset($candidat->photo)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoCandidat">
                                        </div>
                                        <div class="col-10 row mt-2 mb-2  text-justify ml-auto">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nom : </span>{{$candidat->nom_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Prénoms : </span>{{$candidat->prenoms_Candidat}}</div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nationalité : </span>{{$candidat->nationalite_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Sexe : </span>{{$candidat->sexe_Candidat}}</div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Age : </span>{{$candidat->age}} ans</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$candidat->lieu_Residence_Candidat}}</div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">E-mail : </span>{{$candidat->e_mail_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$candidat->situation_Matrimoniale_Candidat}}</div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Téléphone : </span>{{$candidat->telephone_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Permis : </span>{{$candidat->permis_Candidat}}</div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Numero de piece : </span>{{$candidat->numero_Piece_Candidat}}</div>
                                        </div>
                                    </div>
                                    <div class="row text-center justify-content-center d-lg-none  px-4 d-flex">
                                        <div class="col-12 row mt-2 mb-2  text-justify ">
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nom : </span>{{$candidat->nom_Candidat}}</div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Prénoms : </span>{{$candidat->prenoms_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nationalité : </span>{{$candidat->nationalite_Candidat}}</div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Sexe : </span>{{$candidat->sexe_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Age : </span>{{$candidat->age}} ans</div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{$candidat->lieu_Residence_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">E-mail : </span>{{$candidat->e_mail_Candidat}}</div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{$candidat->situation_Matrimoniale_Candidat}}</div>
                                            <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Téléphone : </span>{{$candidat->telephone_Candidat}}</div>
                                            <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Permis : </span>{{$candidat->permis_Candidat}}</div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Numero de piece : </span>{{$candidat->numero_Piece_Candidat}}</div>
                                        </div>
                                    </div>

                                    <h2> Soumissions </h2>
                                    <div class="table-responsive px-4 mb-5">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%;">N°</th>
                                                <th style="width: 25%;">Libelle de la fiche</th>
                                                <th style="width: 25%;">Date de soumission</th>
                                                <th style="width: 25%;">Dernière Étape</th>
                                                <th style="width: 20%;">Statut Étape</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($candidat->Soumissions as $soumission)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$soumission->Offres->libelle_Fiche}}</td>
                                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $soumission->date_Soumission)->format('d-m-Y')}}</td>
                                                    <td>@if(isset($soumission->latestSuivis->etape)){{$soumission->latestSuivis->etape->intitule_Etape}}@endif</td>
                                                    <td>@if(isset($soumission->latestSuivis->etape))@if($soumission->latestSuivis->validation_Etape) <span class="badge badge-success">Validé</span>@else <span class="badge badge-danger">Non validé</span> @endif @endif</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
                                            @foreach($candidat->certifications as $certifications)
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
                                            @foreach($candidat->formations as $formation)
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
                                            @foreach($candidat->competences as $competence)
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
                                            @foreach($candidat->experiences as $experience)
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
                                            @foreach($candidat->parles as $parle)
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
            <!-- End Table candidate -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection