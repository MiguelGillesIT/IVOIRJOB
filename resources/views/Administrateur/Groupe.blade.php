@extends('layouts.Admin.base')

@section('Page_Title')
    Groupes ADMIN
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
                    <button type="button" class="btn btn-hero-lg btn-hero-warning" data-toggle="modal" data-target="#modal-default-add-group"><i class="fa fa-plus-square"> </i>  Créer un groupe</button>
                </div>
            </div>
            <!--End add job offer-->
            <div class="block block-rounded">
                @foreach($groupes as $groupe)
                    <div class="block block-rounded">
                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-none d-lg-flex" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="#">{{$groupe->libelle_Groupe}}</a>
                            </li>
                            <li class="nav-item  ml-auto">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-agent{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i> Ajouter un agent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-group{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> Modifier le groupe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-group{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i> Supprimer le groupe</a>
                            </li>
                        </ul>
                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-lg-none d-sm-flex" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="#">{{$groupe->libelle_Groupe}}</a>
                            </li>
                            <li class="nav-item  ml-auto">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-agent{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-group{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-group{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i></a>
                            </li>
                        </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneGroup{{$loop->iteration}}" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">
                                            N°
                                        </th>
                                        <th style="width: 15%;">Nom</th>
                                        <th style="width: 25%;">Prénoms</th>
                                        <th style="width: 25%;">E-mail</th>
                                        <th style="width: 20%;">Service</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groupe->admins as $admin)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$admin->nom_Administrateur}}</td>
                                            <td>{{$admin->prenoms_Administrateur}}</td>
                                            <td>{{$admin->e_mail_Administrateur}}</td>
                                            <td>{{$admin->service_Administrateur}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-agent{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-agent{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal" id="modal-default-add-agent{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Ajouter un agent</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" action="{{Route('RegisterNewAdmin',['idGroup' => $groupe->id_Groupe])}}" method="post">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorRegistrerAdmin->first('nom_Administrateur'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerAdmin->first('nom_Administrateur')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerAdmin->first('prenoms_Administrateur'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0"></p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle">{{$errors->ErrorRegistrerAdmin->first('prenoms_Administrateur')}}</i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerAdmin->first('e_mail_Administrateur'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerAdmin->first('e_mail_Administrateur')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerAdmin->first('libelle_Groupe'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerAdmin->first('libelle_Groupe')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerAdmin->first('password'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerAdmin->first('password')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerAdmin->first('Confirm_password'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerAdmin->first('Confirm_password')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="nom_add_agent{{$loop->iteration}}">Nom</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="nom_add_agent{{$loop->iteration}}" name = "nom_Administrateur" value = "{{old('nom_Administrateur')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="prenoms_add_agent{{$loop->iteration}}">Prénoms</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="prenoms_add_agent{{$loop->iteration}}" name = "prenoms_Administrateur" value = "{{old('prenoms_Administrateur')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="e_mail_add_agent{{$loop->iteration}}">E-mail</label>
                                                            <div class="input-group">
                                                                <input type="email" class="form-control" id="e_mail_add_agent{{$loop->iteration}}" name = "e_mail_Administrateur"  value = "{{old('e_mail_Administrateur')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="service_add_agent{{$loop->iteration}}">Service</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="service_add_agent{{$loop->iteration}}" name="service_Administrateur">
                                                                    <option value="SOC">SOC</option>
                                                                    <option value="DEVELOPPEMENT">DEVELOPPEMENT</option>
                                                                    <option value="SÉCURITÉ">SÉCURITÉ</option>
                                                                    <option value="ADMINISTRATIF">ADMINISTRATIF</option>
                                                                    <option value="DIRECTION GÉNÉRALE">DIRECTION GÉNÉRALE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="mot_de_passe_add_agent{{$loop->iteration}}">Mot de passe</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control form-control-sm" id = "mot_de_passe_add_agent{{$loop->iteration}}" name = "password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="confirmation_mot_de_passe_add_agent{{$loop->iteration}}">Confirmation de mot de passe</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control form-control-sm" id = "confirmation_mot_de_passe_add_agent{{$loop->iteration}}" name = "Confirm_password">
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
                            <!--Modify a group-->
                            <div class="modal" id="modal-default-modify-group{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier le groupe</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method = "post" action = "{{Route('ModifyGroupe',['id' => $groupe->id_Groupe])}}">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyGroup->first('libelle_Groupe'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyGroup->first('libelle_Groupe')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="libelle_modify_group{{$loop->iteration}}">libellé du groupe</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="libelle_modify_group{{$loop->iteration}}" name = "libelle_Groupe" value = "{{$groupe->libelle_Groupe}}">
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
                            <!--End Modify a group-->
                            <!--Delete a group-->
                             <div class="modal" id="modal-default-delete-group{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer le groupe ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteGroupe',['id' => $groupe->id_Groupe])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LE GROUPE</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <!--End Delete a group-->

                                @foreach($groupe->admins as $admin)
                                    <div class="modal" id="modal-default-delete-agent{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer l'agent ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href="{{Route('DeleteAdmin',['id' => $admin->id_Administrateur])}}"> <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER L'AGENT</button></a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="modal-default-modify-agent{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier l'agent</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form class="js-validation-signup" action="{{Route('ModifyAdmin',["id" => $admin->id_Administrateur])}}" method="post">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyAdmin->first('nom_Administrateur'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyAdmin->first('nom_Administrateur')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                            @elseif($errors->ErrorModifyAdmin->first('prenoms_Administrateur'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyAdmin->first('prenoms_Administrateur')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                            @elseif($errors->ErrorModifyAdmin->first('e_mail_Administrateur'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyAdmin->first('e_mail_Administrateur')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                            @elseif($errors->ErrorModifyAdmin->first('service_Administrateur'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyAdmin->first('service_Administrateur')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="nom_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}">Nom</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="nom_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}" name="nom_Administrateur" value = "{{$admin->nom_Administrateur}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="prenoms_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}">Prénoms</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="prenoms_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}" name="prenoms_Administrateur" value = "{{$admin->prenoms_Administrateur}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="e_mail_modify_agent11">E-mail</label>
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control" id="e_mail_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}" name="e_mail_Administrateur" value = "{{$admin->e_mail_Administrateur}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="service_add_agent1">Service</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="service_modify_agent{{$loop->parent->iteration}}{{$loop->iteration}}" name="service_Administrateur">
                                                                        <option value="SOC" @if($admin->service_Administrateur =="SOC" )selected @endif>SOC</option>
                                                                        <option value="DEVELOPPEMENT" @if($admin->service_Administrateur == "DEVELOPPEMENT")selected @endif>DEVELOPPEMENT</option>
                                                                        <option value="SÉCURITÉ" @if($admin->service_Administrateur == "SÉCURITÉ")selected @endif>SÉCURITÉ</option>
                                                                        <option value="ADMINISTRATIF" @if($admin->service_Administrateur == "ADMINISTRATIF" )selected @endif>ADMINISTRATIF</option>
                                                                        <option value="DIRECTION GÉNÉRALE" @if($admin->service_Administrateur == "DIRECTION GÉNÉRALE")selected @endif>DIRECTION GÉNÉRALE</option>
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
                                @endforeach
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <!--Add group Form-->
            <div class="modal" id="modal-default-add-group" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title modal-header-color">Ajouter un groupe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form class="js-validation-signup"  action = "{{Route('RegisterGroupe')}}" method="post">
                            @csrf
                            <div class="py-3">
                                @if($errors->ErrorRegistrerGroup->first('libelle_Groupe'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0">{{$errors->ErrorRegistrerGroup->first('libelle_Groupe')}}</p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="libelle_add_groupe">libellé du groupe</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="libelle_add_groupe" name = "libelle_Groupe">
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
            <!--End Add group Form-->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
