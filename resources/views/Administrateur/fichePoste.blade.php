@extends('layouts.Admin.base')

@section('Page_Title')
    Fiche de poste
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
            <!--Add new job offer-->
            <div class=" row justify-content-end d-flex mt-4 mb-4">
                <div class=" col-6 col-sm-5 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-hero-lg btn-hero-warning" data-toggle="modal" data-target="#modal-default-add-job-offer"><i class="fa fa-plus-square"> </i>  Créer une fiche de poste</button>
                </div>
            </div>
            <!--End add job offer-->

            {{--Job offers--}}
                @foreach( $fichePostes as $fichePoste)
                    <div class="block block-rounded">
                        <div class="block block-rounded">

                            <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-none d-lg-flex" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link button-left" href="#">Fiche N°{{$loop->iteration}}</a>
                                </li>
                                <li class="nav-item ml-auto">
                                    <a class="nav-link button-right" href="{{Route('DetailsFiche',['idFiche' => $fichePoste->id_Fiche])}}"><i class="fa fa-eye"></i> Détails ({{$fichePoste->Soumissions->count()}}) </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Critera{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i> Ajouter Critère</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-job-offer{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> Modifier la fiche</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-job-offer{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i> Supprimer la fiche</a>
                                </li>
                            </ul>
                            <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-lg-none d-sm-flex" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link button-left" href="#">Fiche N°{{$loop->iteration}}</a>
                                </li>
                                <li class="nav-item ml-auto">
                                    <a class="nav-link button-right" href="{{Route('DetailsFiche',['idFiche' => $fichePoste->id_Fiche])}}"><i class="fa fa-eye"></i> ({{$fichePoste->Soumissions->count()}}) </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Critera{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-job-offer{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-job-offer{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i></a>
                                </li>
                            </ul>
                            <div class="block-content-new borderColor tab-content">
                                <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                                    <div class="text-center row justify-content-center">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-center">
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4"><span class="font-w700">Libellé : </span>{{$fichePoste->libelle_Fiche}}</div>
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4"><span class="font-w700">Date limite de soumission : </span>{{$fichePoste->format_limite_date}}</div>
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-3"><span class="font-w700">Type d'offre : </span>{{$fichePoste->type_Offre}}</div>
                                            <div class="col-11 col-sm-11 col-md-11 col-lg-11 mt-3 text-justify"><span class="font-w700">Description : </span>{{$fichePoste->description_Fiche}}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%;">
                                                    N°
                                                </th>
                                                <th style="width: 25%;">Critère</th>
                                                <th style="width: 25%;">Valeur</th>
                                                <th style="width: 15%;">Statut</th>
                                                <th style="width: 20%;">Type</th>
                                                <th class="text-center" style="width: 10%;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($fichePoste->criteres as $critere)
                                                    <tr>
                                                        <td class="text-center">{{$loop->iteration}}</td>
                                                        <td>{{$critere->libelle_Critere}}</td>
                                                        <td>{{$critere->valeur_Critere}}</td>
                                                        <td>@if($critere->statut_Critere) OBLIGATOIRE @else OPTIONNEL @endif</td>
                                                        <td>{{$critere->type_Critere}}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                            <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-critera{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="modal" id="modal-default-add-Critera{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Ajouter un critère</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" action="{{Route('RegisterCritere',['idFiche' => $fichePoste->id_Fiche])}}" method="post">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorRegistrerCritere->first('libelle_Critere'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorRegistrerCritere->first('libelle_Critere')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorRegistrerCritere->first('valeur_Critere'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorRegistrerCritere->first('valeur_Critere')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorRegistrerCritere->first('type_Critere'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorRegistrerCritere->first('type_Critere')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                            @if(session('ErrorTypeCritera'))
                                                                <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                    <div class="flex-fill mr-3">
                                                                        <p class="mb-0">{{session('ErrorTypeCritera')}}</p>
                                                                    </div>
                                                                    <div class="flex-00-auto">
                                                                        <i class="fa fa-fw fa-times-circle"></i>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="intitule_add_Critera{{$loop->iteration}}">libellé</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="intitule_add_Critera{{$loop->iteration}}" name="libelle_Critere">
                                                                        <option value="Compétence">Compétence</option>
                                                                        <option value="Certification">Certification</option>
                                                                        <option value="Poste précedemment occupé">Poste précedemment occupé</option>
                                                                        <option value="Nombre d'années d'experience">Nombre d'années d'experience</option>
                                                                        <option value="secteur de l'experience">secteur de l'experience</option>
                                                                        <option value="type de contrat de l'experience">type de contrat de l'experience</option>
                                                                        <option value="intitule de la formation">intitule de la formation</option>
                                                                        <option value="etablissement de la formation">etablissement de la formation</option>
                                                                        <option value="diplome de la formation" >diplome de la formation</option>
                                                                        <option value="age du candidat">age du candidat</option>
                                                                        <option value="situation matrimoniale du candidat">Situation matrimoniale du candidat</option>
                                                                        <option value="permis du candidat" >permis du candidat</option>
                                                                        <option value="langue parlée par le candidat">langue parlée par le candidat candidat</option>
                                                                        <option value="niveau de la langue parlée candidat">niveau de la langue parlée candidat</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="valeur_add_Critera1">Valeur</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="valeur_add_Critera{{$loop->iteration}}"  name="valeur_Critere" value="{{old('valeur_Critere')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="type_add_Critera1">Type</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="type_add_Critera{{$loop->iteration}}" name="type_Critere">
                                                                        <option value="ÉGAL">ÉGAL</option>
                                                                        <option value="SUPÉREUR">SUPÉREUR</option>
                                                                        <option value="INFÉRIEUR">INFÉRIEUR</option>
                                                                        <option value="SUPÉREUR OU ÉGAL">SUPÉREUR OU ÉGAL</option>
                                                                        <option value="INFÉRIEUR OU ÉGAL">INFÉRIEUR OU ÉGAL</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <div class="input-group">
                                                                    <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                                                        <input type="checkbox" class="custom-control-input" id="obligation_add_Critera{{$loop->iteration}}" name="statut_Critere"  value="Oui">
                                                                        <label class="custom-control-label" for="obligation_add_Critera{{$loop->iteration}}">Obligatoire ?</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value="AJOUTER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    <!--Modify a critera-->
                                    @foreach($fichePoste->criteres as $critere)
                                        <div class="modal" id="modal-default-modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title modal-header-color">Modifier le critère</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>

                                                    <form class="js-validation-signup" method="post" action="{{Route('ModifyCritere',['id' => $critere->id_Critere])}}">
                                                        @csrf
                                                        <div class="py-3">
                                                            @if($errors->ErrorModifyCritere->first('libelle_Critere'))
                                                                <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                    <div class="flex-fill mr-3">
                                                                        <p class="mb-0">{{$errors->ErrorModifyCritere->first('libelle_Critere')}}</p>
                                                                    </div>
                                                                    <div class="flex-00-auto">
                                                                        <i class="fa fa-fw fa-times-circle"></i>
                                                                    </div>
                                                                </div>
                                                            @elseif($errors->ErrorModifyCritere->first('valeur_Critere'))
                                                                <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                    <div class="flex-fill mr-3">
                                                                        <p class="mb-0">{{$errors->ErrorModifyCritere->first('valeur_Critere')}}</p>
                                                                    </div>
                                                                    <div class="flex-00-auto">
                                                                        <i class="fa fa-fw fa-times-circle"></i>
                                                                    </div>
                                                                </div>
                                                            @elseif($errors->ErrorModifyCritere->first('type_Critere'))
                                                                <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                    <div class="flex-fill mr-3">
                                                                        <p class="mb-0">{{$errors->ErrorModifyCritere->first('type_Critere')}}</p>
                                                                    </div>
                                                                    <div class="flex-00-auto">
                                                                        <i class="fa fa-fw fa-times-circle"></i>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                                @if(session('ErrorModifyTypeCritera'))
                                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                        <div class="flex-fill mr-3">
                                                                            <p class="mb-0">{{session('ErrorModifyTypeCritera')}}</p>
                                                                        </div>
                                                                        <div class="flex-00-auto">
                                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            <div class="form-group">
                                                                    <div class="ml-sm-5 col-10">
                                                                        <label for="intitule_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}">libellé</label>
                                                                        <div class="input-group">
                                                                            <select class="form-control" id="intitule_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}"  name="libelle_Critere">
                                                                                <option value="Compétence" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "Compétence") selected @endif @endif>Compétence</option>
                                                                                <option value="Certification" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "Certification") selected @endif @endif>Certification</option>
                                                                                <option value="Poste précedemment occupé" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "Poste précedemment occupé") selected @endif @endif>Poste précedemment occupé</option>
                                                                                <option value="Nombre d'années d'experience" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "Nombre d'années d'experience") selected @endif @endif>Nombre d'années d'experience</option>
                                                                                <option value="secteur de l'experience" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "secteur de l'experience") selected @endif @endif>secteur de l'experience</option>
                                                                                <option value="type de contrat de l'experience" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "type de contrat de l'experience") selected @endif @endif>type de contrat de l'experience</option>
                                                                                <option value="intitule de la formation" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "intitule de la formation") selected @endif @endif>intitule de la formation</option>
                                                                                <option value="etablissement de la formation" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "etablissement de la formation") selected @endif @endif>etablissement de la formation</option>
                                                                                <option value="diplome de la formation" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "diplome de la formation") selected @endif @endif>diplome de la formation</option>
                                                                                <option value="age du candidat" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "age du candidat") selected @endif @endif>age du candidat</option>
                                                                                <option value="situation matrimoniale du candidat" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "situation matrimoniale du candidat") selected @endif @endif>Situation matrimoniale du candidat</option>
                                                                                <option value="permis du candidat" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "permis du candidat") selected @endif @endif>permis du candidat</option>
                                                                                <option value="langue parlée par le candidat" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "langue parlée par le candidat") selected @endif @endif>langue parlée par le candidat candidat</option>
                                                                                <option value="niveau de la langue parlée candidat" @if(isset($critere->libelle_Critere)) @if($critere->libelle_Critere == "niveau de la langue parlée candidat") selected @endif @endif>niveau de la langue parlée candidat</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group">
                                                                <div class="ml-sm-5 col-10">
                                                                    <label for="valeur_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}">Valeur</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="valeur_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}"name="valeur_Critere" value="{{$critere->valeur_Critere}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="ml-sm-5 col-10">
                                                                    <label for="type_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}">Type</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control" id="type_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}"  name="type_Critere">
                                                                            <option value="ÉGAL" @if(isset($critere->type_Critere)) @if($critere->type_Critere == "ÉGAL") selected @endif @endif>ÉGAL</option>
                                                                            <option value="SUPÉREUR" @if(isset($critere->type_Critere)) @if($critere->type_Critere == "SUPÉREUR") selected @endif @endif>SUPÉREUR</option>
                                                                            <option value="INFÉRIEUR" @if(isset($critere->type_Critere)) @if($critere->type_Critere == "INFÉRIEUR") selected @endif @endif>INFÉRIEUR</option>
                                                                            <option value="SUPÉREUR OU ÉGAL" @if(isset($critere->type_Critere)) @if($critere->type_Critere == "SUPÉREUR OU ÉGAL") selected @endif @endif>SUPÉREUR OU ÉGAL</option>
                                                                            <option value="INFÉRIEUR OU ÉGAL" @if(isset($critere->type_Critere)) @if($critere->type_Critere == "INFÉRIEUR OU ÉGAL") selected @endif @endif>INFÉRIEUR OU ÉGAL</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="ml-sm-5 col-10">
                                                                    <div class="input-group">
                                                                        <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                                                            <input type="checkbox" class="custom-control-input" id="obligation_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}" name="statut_Critere" @if($critere->statut_Critere)checked @endif value="Oui">
                                                                            <label class="custom-control-label" for="obligation_modify-critera{{$loop->parent->iteration}}{{$loop->iteration}}">Obligatoire ?</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-hero-lg btn-hero-warning" value="MODIFIER">
                                                            <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--End Modify a job offer-->
                                    <!--Delete a critera-->
                                    @foreach($fichePoste->criteres as $critere)
                                        <div class="modal" id="modal-default-delete-critera{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer le critère ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href = "{{Route('DeleteCritere',['id' => $critere->id_Critere])}}">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LE CRITÈRE</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--End Delete a critera-->


                                    <!--Modify a job offer-->
                                    <div class="modal" id="modal-default-modify-job-offer{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier la fiche de poste</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" method="post" action="{{Route('ModifyFichePoste',['id' => $fichePoste->id_Fiche])}}">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyFichePoste->first('libelle_Fiche'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyFichePoste->first('libelle_Fiche')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyFichePoste->first('description_Fiche'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyFichePoste->first('description_Fiche')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyFichePoste->first('date_Limite_Candidature'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyFichePoste->first('date_Limite_Candidature')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyFichePoste->first('type_Offre'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyFichePoste->first('type_Offre')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="intitule_modify_fiche{{$loop->iteration}}">libellé</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="intitule_modify_fiche{{$loop->iteration}}"  name="libelle_Fiche" value="{{$fichePoste->libelle_Fiche}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="description_modify_fiche{{$loop->iteration}}">Description</label>
                                                                <div class="input-group">
                                                                    <textarea class="form-control" id="description_modify_fiche{{$loop->iteration}}" name="description_Fiche" rows="4" cols="50">{{$fichePoste->description_Fiche}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="date_limite_modify_fiche{{$loop->iteration}}">Date limite de soumission</label>
                                                                <div class="input-group">

                                                                    <input class="form-control" type="date" id="date_limite_modify_fiche{{$loop->iteration}}" name="date_Limite_Candidature" value="{{$fichePoste->LimiteDate}}" min="2021-01-01">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="type_modify_fiche{{$loop->iteration}}">Type d'offre</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="type_modify_fiche{{$loop->iteration}}" name="type_Offre">
                                                                        <option value="CDD" @if(isset($fichePoste->type_Offre)) @if($fichePoste->type_Offre == "CDD") selected @endif @endif>CDD</option>
                                                                        <option value="CDI" @if(isset($fichePoste->type_Offre)) @if($fichePoste->type_Offre == "CDI") selected @endif @endif>CDI</option>
                                                                        <option value="STAGE" @if(isset($fichePoste->type_Offre)) @if($fichePoste->type_Offre == "STAGE") selected @endif @endif>STAGE</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-warning" value="MODIFIER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modify a job offer-->
                                    <!--Delete a job offer-->
                                    <div class="modal" id="modal-default-delete-job-offer{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer la fiche de poste ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href = {{Route('DeleteFichePoste',['id' => $fichePoste->id_Fiche])}}>
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA FICHE DE POSTE</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Delete a job offer-->
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            {{--End job offers--}}

            <!--Add Job offer Form-->
            <div class="modal" id="modal-default-add-job-offer" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title modal-header-color">Ajouter une fiche de poste</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form class="js-validation-signup" action="{{Route('RegisterFichePoste')}}" method="post">
                            @csrf
                            <div class="py-3">
                                @if($errors->ErrorRegistrerFichePoste->first('libelle_Fiche'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"> {{$errors->ErrorRegistrerFichePoste->first('libelle_Fiche')}}</i>
                                        </div>
                                    </div>
                                @elseif($errors->ErrorRegistrerFichePoste->first('description_Fiche'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0">{{$errors->ErrorRegistrerFichePoste->first('description_Fiche')}}</p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </div>
                                    </div>
                                @elseif($errors->ErrorRegistrerFichePoste->first('date_Limite_Candidature'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0"> {{$errors->ErrorRegistrerFichePoste->first('date_Limite_Candidature')}}</p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="libelle_fiche_add">libellé</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="libelle_fiche_add" name="libelle_Fiche" value="{{old('libelle_Fiche')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="description_fiche_add">Description</label>
                                        <div class="input-group">
                                            <textarea  class="form-control" id="description_fiche_add" name="description_Fiche" rows="4" cols="50" >{{old('description_Fiche')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="date_limite_candidature_add">Date limite de soumission</label>
                                        <div class="input-group">
                                            <input class="form-control" type="date" id="date_limite_candidature_add" name="date_Limite_Candidature" value="{{old('date_Limite_Candidature')}}" min="2021-01-01">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="type_offre_add">Type d'offre</label>
                                        <div class="input-group">
                                            <select class="form-control" id="type_offre_add" name="type_Offre">
                                                <option value="CDD">CDD</option>
                                                <option value="CDI">CDI</option>
                                                <option value="STAGE">STAGE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-hero-lg btn-hero-success" value="AJOUTER">
                                <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--End Add Job offer Form-->

        </div>
        <!-- END Page Content -->
    </main>
@endsection