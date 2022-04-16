@extends('layouts.Admin.base')

@section('Page_Title')
    Détails fiche
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_Partie.min.css')}}
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
                    <button type="button" class="btn btn-hero-lg btn-hero-warning" data-toggle="modal" data-target="#modal-default-add-question"><i class="fa fa-plus-square"> </i> Ajouter une question</button>
                </div>
            </div>
            {{--Job offers--}}
            <div class="block block-rounded">
                <div class="block block-rounded">

                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="{{Route('ShowQuizPage')}}"><i class="fa fa-reply"> </i> Quiz</a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                            <div class="text-center row justify-content-center">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-center">
                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Libellé : </span>{{$Partie->libelle_Partie}}</div>
                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">intitulé du quiz : </span>{{$Partie->quiz->intitule_Quiz}}</div>
                                </div>
                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 row mt-2 mb-2 justify-content-center text-justify">
                                    <span class="font-w700">Description : </span>{{$Partie->description_Partie}}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">
                                            N°
                                        </th>
                                        <th style="width: 30%;">libellé</th>
                                        <th style="width: 10%;">Type</th>
                                        <th style="width: 10%;">Durée</th>
                                        <th style="width: 10%;">Point</th>
                                        <th style="width: 25%;">Photo</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Partie->questions as $question)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td><a class = "font-w700 " style = "color:#495057" href = {{Route('ShowQuestion', ['idQuestion' => $question->id_Question])}}>{{$question->libelle_Question}}</a></td>
                                            <td>{{$question->type_Question}}</td>
                                            <td>{{$question->duree_Question}}</td>
                                            <td>{{$question->point_Question}}</td>
                                            <td><img class="img-avatar img-avatar96 img-avatar-thumb" @if(isset($question->photo_Question)) src= "{{asset($question->chemin_photo_question)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="QuizPhoto"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-question{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-question{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach($Partie->questions as $question)
                                <div class="modal" id="modal-default-modify-question{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier la question</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('ModifyQuestion',['id' => $question->id_Question])}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyQuestion->first('libelle_Question'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyQuestion->first('libelle_Question')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyQuestion->first('duree_Question'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyQuestion->first('duree_Question')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                        @elseif($errors->ErrorModifyQuestion->first('point_Question'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyQuestion->first('point_Question')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyQuestion->first('photo_Question'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyQuestion->first('photo_Question')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyQuestion->first('type_Question'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyQuestion->first('type_Question')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="libelle_modify_question{{$loop->iteration}}">Libellé</label>
                                                            <div class="input-group">
                                                                <textarea class="form-control" id="libelle_modify_question{{$loop->iteration}}"  name="libelle_Question">value="{{$question->libelle_Question}}"</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="type_modify_question{{$loop->iteration}}">Type</label>
                                                            <div class="input-group">
                                                                <select  class="form-control"  id="type_modify_question{{$loop->iteration}}" name="type_Question">
                                                                    <option value="QCM" @if(isset($question->type_Question)) @if($question->type_Question == "QCM" ) selected @endif @endif>QCM</option>
                                                                    <option value="VraiFaux" @if(isset($question->type_Question)) @if($question->type_Question == "VraiFaux" ) selected @endif @endif>VRAI OU FAUX</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="duree_question_modify{{$loop->iteration}}">Durée</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" id="duree_question_modify{{$loop->iteration}}"  type="time" min="00:00" max="01:00" name="duree_Question" value="{{$question->duree_Question}}" max = "5" min = "1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="point_question_modify{{$loop->iteration}}">Point</label>
                                                                <div class="input-group">
                                                                    <input type="number"  id="point_question_modify{{$loop->iteration}}"   class="form-control" name="point_Question" value="{{$question->point_Question}}" min = "1" max = "5">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="photo_question_modify{{$loop->iteration}}">Photo</label>
                                                                <div class="input-group">
                                                                    <input type="file" id="photo_question_modify{{$loop->iteration}}"  name="photo_Question">
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
                                <div class="modal" id="modal-default-delete-question{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer la question ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteQuestion',['id' =>  $question->id_Question])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA QUESTION</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="modal" id="modal-default-add-question" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title modal-header-color">Ajouter une question</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <form class="js-validation-signup" method="post" action="{{Route('RegisterQuestion',['idPart' =>  $Partie->id_Partie])}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="py-3">
                                                @if($errors->ErrorRegistrerQuestion->first('libelle_Question'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerQuestion->first('libelle_Question')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @elseif($errors->ErrorRegistrerQuestion->first('duree_Question'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerQuestion->first('duree_Question')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @elseif($errors->ErrorRegistrerQuestion->first('point_Question'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerQuestion->first('point_Question')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @elseif($errors->ErrorRegistrerQuestion->first('photo_Question'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerQuestion->first('photo_Question')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @elseif($errors->ErrorRegistrerQuestion->first('type_Question'))
                                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                        <div class="flex-fill mr-3">
                                                            <p class="mb-0">{{$errors->ErrorRegistrerQuestion->first('type_Question')}}</p>
                                                        </div>
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times-circle"></i>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="libelle_add_question">Libellé</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" id="libelle_add_question"  name="libelle_Question"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="type_add_question">Type</label>
                                                        <div class="input-group">
                                                            <select  class="form-control"  id="type_add_question" name="type_Question">
                                                                <option value="QCM">QCM</option>
                                                                <option value="VraiFaux">VRAI OU FAUX</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="duree_question_add">Durée</label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="duree_question_add" min="00:00" max="01:00"  type="time" name="duree_Question"  max = "5" min = "1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="point_question_add">Point</label>
                                                        <div class="input-group">
                                                            <input type="number"  id="point_question_add"   class="form-control" name="point_Question" min = "1" max = "5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ml-sm-5 col-10">
                                                        <label for="photo_question_add">Photo</label>
                                                        <div class="input-group">
                                                            <input type="file" id="photo_question_add"  name="photo_Question">
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