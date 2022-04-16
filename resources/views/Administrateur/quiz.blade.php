@extends('layouts.Admin.base')

@section('Page_Title')
    Quiz
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
                    <button type="button" class="btn btn-hero-lg btn-hero-warning" data-toggle="modal" data-target="#modal-default-add-quiz"><i class="fa fa-plus-square"> </i>  Créer un quiz</button>
                </div>
            </div>
            <!--End add job offer-->

            {{--Job offers--}}
            @foreach( $quizz as $quiz)
                <div class="block block-rounded">
                    <div class="block block-rounded">

                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-none d-lg-flex" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="#">Quiz N°{{$loop->iteration}}</a>
                            </li>
                            @if(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$quiz->fichePoste->date_Limite_Candidature)->lt(today()))
                                <li class="nav-item  ml-auto">
                                    <a class="nav-link button-right" href="{{Route('TriggerQuiz',[ 'idQuiz'=> $quiz->id_Quiz ])}}"><i class="fa fa-question-circle"></i> Lancer le quiz </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Part{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i> Ajouter Partie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-quiz{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> Modifier le quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-quiz{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i> Supprimer le quiz</a>
                                </li>
                            @else
                                <li class="nav-item ml-auto">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Part{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i> Ajouter Partie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-quiz{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> Modifier le quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-quiz{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i> Supprimer le quiz</a>
                                </li>
                            @endif


                        </ul>
                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled d-lg-none d-sm-flex" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link button-left" href="#">Quiz N°{{$loop->iteration}}</a>
                            </li>
                            <li class="nav-item  ml-auto">
                                <a class="nav-link button-right" href="{{Route('TriggerQuiz',[ 'idQuiz'=> $quiz->id_Quiz ])}}"><i class="fa fa-question-circle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Part{{$loop->iteration}}" href="#"><i class="fa fa-plus-square"> </i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-modify-quiz{{$loop->iteration}}" href="#"><i class="fa fa-pen"> </i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link button-right"  data-toggle="modal" data-target="#modal-default-delete-quiz{{$loop->iteration}}" href="#"><i class="fa fa-times-circle"> </i></a>
                            </li>
                        </ul>
                        <div class="block-content-new borderColor tab-content">
                            <div class="tab-pane active" id="tab_paneFiche1" role="tabpanel">
                                <div class="text-center row justify-content-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 row mb-2 justify-content-center">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Intitulé : </span>{{$quiz->intitule_Quiz}}</div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Date limite de participation : </span>{{$quiz->date_quiz}}</div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Fiche de poste : </span>{{$quiz->fichePoste->libelle_Fiche}}</div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6"><span class="font-w700">Score minimal : </span>{{$quiz->score_Minimal_Quiz}}</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%;">
                                                N°
                                            </th>
                                            <th style="width: 30%;">Libellé</th>
                                            <th style="width: 55%;">Description</th>
                                            <th class="text-center" style="width: 10%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quiz->parties as $partie)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td><a class = "font-w700 " style = "color:#495057 " href = {{Route('ShowPartie', ['idPartie' => $partie->id_Partie])}}>{{$partie->libelle_Partie}}</a></td>
                                                <td>{{$partie->description_Partie}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-part{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                    <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-part{{$loop->parent->iteration}}{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal" id="modal-default-add-Part{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Ajouter une partie</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('RegisterPartie',['idQuiz' => $quiz->id_Quiz])}}">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorRegistrerPartie->first('libelle_Partie'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerPartie->first('libelle_Partie')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorRegistrerPartie->first('description_Partie'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorRegistrerPartie->first('description_Partie')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="libelle_add_Critera1">Libellé</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="libelle_add_Critera{{$loop->iteration}}"  name="libelle_Partie" value="{{old('libelle_Partie')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="description_add_part{{$loop->iteration}}">Description</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="description_add_part{{$loop->iteration}}"  name="description_Partie" value="{{old('description_Partie')}}">
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


                                <!--Modify a part-->
                                @foreach($quiz->parties as $partie)
                                    <div class="modal" id="modal-default-modify-part{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier la partie</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" method="post" action="{{Route('ModifyPartie',['id' => $partie->id_Partie])}}">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyPartie->first('libelle_Partie'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyPartie->first('libelle_Partie')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyPartie->first('description_Partie'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyPartie->first('description_Partie')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="libelle_modify-part{{$loop->parent->iteration}}{{$loop->iteration}}">Libellé</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="libelle_modify-part{{$loop->parent->iteration}}{{$loop->iteration}}" name="libelle_Partie" value="{{$partie->libelle_Partie}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="description_modify-part{{$loop->parent->iteration}}{{$loop->iteration}}">Descritpion</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="description_modify-part{{$loop->parent->iteration}}{{$loop->iteration}}" name="description_Partie" placeholder = "Description de la partie" value="{{$partie->description_Partie}}">
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
                            <!--End Modify a part offer-->

                                <!--Delete a part-->
                                @foreach($quiz->parties as $partie)
                                    <div class="modal" id="modal-default-delete-part{{$loop->parent->iteration}}{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer la partie ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href="{{Route('DeletePartie',['id' =>  $partie->id_Partie])}}">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA PARTIE</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <!--End Delete a part-->


                                <!--Modify a quiz-->
                                <div class="modal" id="modal-default-modify-quiz{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier la fiche de poste</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('ModifyQuiz',['id' => $quiz->id_Quiz])}}">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyQuiz->first('intitule_Quiz'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyQuiz->first('intitule_Quiz')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyQuiz->first('date_Limite_Quiz'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyQuiz->first('date_Limite_Quiz')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyQuiz->first('score_Minimal_Quiz'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyQuiz->first('score_Minimal_Quiz')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="intitule_modify_quiz{{$loop->iteration}}">Intitulé</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="intitule_modify_quiz{{$loop->iteration}}"  name="intitule_Quiz" value="{{$quiz->intitule_Quiz}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="score_minimal_Quiz_modify{{$loop->iteration}}">Score minimal</label>
                                                            <div class="input-group">
                                                                <input class="form-control" id="score_minimal_Quiz_modify{{$loop->iteration}}" type="number"  name="score_Minimal_Quiz" value="{{$quiz->score_Minimal_Quiz}}" placeholder = "Score minimal du quiz"  min = "10" max = "1000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="date_limite_modify_quiz{{$loop->iteration}}">Date limite de participation</label>
                                                            <div class="input-group">

                                                                <input class="form-control" type="date" id="date_limite_modify_quiz{{$loop->iteration}}"  name="date_Limite_Quiz" value="{{$quiz->date_quiz}}" min="2021-01-01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="type_modify_fiche{{$loop->iteration}}">Type d'offre</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="type_modify_fiche{{$loop->iteration}}" name="Fiche_Poste">
                                                                    @foreach($fichePostes as $fichePoste)
                                                                        <option value="{{$fichePoste->libelle_Fiche}}" @if(isset($quiz->fichePoste->libelle_Fiche)) @if($quiz->fichePoste->libelle_Fiche == $fichePoste->libelle_Fiche) selected @endif @endif>{{$fichePoste->libelle_Fiche}}</option>
                                                                    @endforeach
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
                                <!--End Modify a quiz-->

                                <!--Delete a quiz-->
                                <div class="modal" id="modal-default-delete-quiz{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer le quiz ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteQuiz',['id' =>  $quiz->id_Quiz])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LE QUIZ</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--End Delete a quiz-->
                            </div>
                        </div>

                    </div>
                </div>
        @endforeach
        {{--End job offers--}}

        <!--Add Job offer Form-->
            <div class="modal" id="modal-default-add-quiz" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title modal-header-color">Ajouter un quiz</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form class="js-validation-signup" action="{{Route('RegisterQuiz')}}" method="post">
                            @csrf
                            <div class="py-3">
                                @if($errors->ErrorRegistrerQuiz->first('intitule_Quiz'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"> {{$errors->ErrorRegistrerQuiz->first('intitule_Quiz')}}</i>
                                        </div>
                                    </div>
                                @elseif($errors->ErrorRegistrerQuiz->first('date_Limite_Quiz'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0">{{$errors->ErrorRegistrerQuiz->first('date_Limite_Quiz')}}</p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </div>
                                    </div>
                                @elseif($errors->ErrorRegistrerQuiz->first('score_Minimal_Quiz'))
                                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                        <div class="flex-fill mr-3">
                                            <p class="mb-0"> {{$errors->ErrorRegistrerQuiz->first('score_Minimal_Quiz')}}</p>
                                        </div>
                                        <div class="flex-00-auto">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="intitule_add_Quiz">Intitulé</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="intitule_add_Quiz" name="intitule_Quiz" value="{{old('intitule_Quiz')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="add_date_Limite_Quiz">Date limite de participation</label>
                                        <div class="input-group">
                                            <input  class="form-control" type = "date" id="add_date_Limite_Quiz" name="date_Limite_Quiz" value="{{old('date_Limite_Quiz')}}" min="2021-01-01">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="score_minimal_quiz_add">Score minimal</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" id="score_minimal_quiz_add" name="score_Minimal_Quiz" value="{{old('score_Minimal_Quiz')}}" min = "10" max = "1000">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ml-sm-5 col-10">
                                        <label for="add_fiche_poste">Fiche de poste</label>
                                        <div class="input-group">
                                            <select class="form-control" id="add_fiche_poste" name="Fiche_Poste">
                                                @foreach($fichePostes as $fichePoste)
                                                    <option value="{{$fichePoste->libelle_Fiche}}">{{$fichePoste->libelle_Fiche}}</option>
                                                @endforeach
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
