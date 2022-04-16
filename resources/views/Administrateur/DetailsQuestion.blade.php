@extends('layouts.Admin.base')

@section('Page_Title')
    Détails question
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_Question.min.css')}}
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
            <div class=" row justify-content-end d-flex mt-4 mb-4">
                <div class=" col-6 col-sm-5 col-md-4 col-lg-3">
                    <button type="button" class="btn btn-hero-lg btn-hero-warning" data-toggle="modal" data-target="#modal-default-add-proposition"><i class="fa fa-plus-square"> </i> Ajouter une réponse</button>
                </div>
            </div>
            {{--Job offers--}}
            <div class="block block-rounded">
                <div class="block block-rounded">

                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="{{Route('ShowPartie', ['idPartie' => $question->parties->id_Partie])}}"><i class="fa fa-reply"> </i> Partie</a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                            <div class="row text-center justify-content-center mb-3 mt-3">
                                <div class="col-2">
                                    <img class="img-avatar img-avatar128 img-avatar-thumb" @if(isset($question->photo_Question )) src= "{{asset($question->chemin_photo_question)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoQuestion">
                                </div>
                                <div class="col-8 row mt-2 mb-2 text-justify justify-content-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Libellé : </span>{{$question->libelle_Question}}</div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4"><span class="font-w700">Type : </span>{{$question->type_Question}}</div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4"><span class="font-w700">Durée : </span>{{$question->duree_Question}}</div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4"><span class="font-w700">Point : </span>{{$question->point_Question}}</div>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">
                                            N°
                                        </th>
                                        <th style="width: 30%;">Réponse</th>
                                        <th style="width: 10%;">Statut</th>
                                        <th class="text-center" style="width: 45%;">Photo</th>
                                        <th class="text-center" style="width: 15%;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($question->propositions as $proposition)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$proposition->reponse}}</td>
                                            <td>@if($proposition->statut_Solution)VRAI @else FAUX @endif</td>
                                            <td class="text-center"><img class="img-avatar img-avatar96 img-avatar-thumb" @if(isset($proposition->photo_Proposition)) src= "{{asset($proposition->CheminPhotoProposition)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="Proposition photo"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-proposition{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-proposition{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach($question->propositions as $proposition)
                                <div class="modal" id="modal-default-modify-proposition{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier la proposition</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('ModifyProposition',['id' => $proposition->id_Proposition])}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyProposition->first('reponse'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyProposition->first('reponse')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyProposition->first('photo_Proposition'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyProposition->first('photo_Proposition')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="libelle_modify_proposition{{$loop->iteration}}">Réponse</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="libelle_modify_proposition{{$loop->iteration}}"  name="reponse" value = {{$proposition->reponse}}>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="photo_proposition_modify{{$loop->iteration}}">Photo</label>
                                                            <div class="input-group">
                                                                <input type="file" id="photo_proposition_modify{{$loop->iteration}}"  name="photo_Proposition">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <div class="input-group">
                                                                    <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                                                        @if($proposition->statut_Solution)
                                                                            <input class="custom-control-input" type="checkbox" id="statut_modify_proposition{{$loop->iteration}}" name="statut_Solution"  value="Vrai" checked>
                                                                        @else
                                                                            <input class="custom-control-input" type="checkbox" id="statut_modify_proposition{{$loop->iteration}}" name="statut_Solution"  value="Vrai">
                                                                        @endif
                                                                        <label  class="custom-control-label" for="statut_modify_proposition{{$loop->iteration}}">Statut de la réponse</label>
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
                                <div class="modal" id="modal-default-delete-proposition{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer la proposition de réponse ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteProposition',['id' =>  $proposition->id_Proposition])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA PROPOSITION</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="modal" id="modal-default-add-proposition" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title modal-header-color">Ajouter une réponse</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <form class="js-validation-signup" method="post" action="{{Route('RegisterProposition',['idQuestion' => $question->id_Question])}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="py-3">
                                                @if($errors->ErrorRegistrerProposition->first('reponse'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerProposition->first('reponse')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @elseif($errors->ErrorRegistrerProposition->first('photo_Proposition'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerProposition->first('photo_Proposition')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="libelle_add_proposition">Réponse</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="libelle_add_proposition"  name="reponse" value = {{old('reponse')}}>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="photo_proposition_add">Photo</label>
                                                        <div class="input-group">
                                                            <input type="file" id="photo_proposition_add"  name="photo_Proposition">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <div class="input-group">
                                                            <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                                                <input class="custom-control-input" type="checkbox" id="statut_add_proposition" name="statut_Solution"  value="Vrai">
                                                                <label class="custom-control-label"  for="statut_add_proposition">Statut de la réponse</label>
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
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- END Page Content -->
    </main>
@endsection