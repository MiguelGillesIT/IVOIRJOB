@extends('layouts.Candidat.base')

@section('Page_Title')
    Profil
@endsection

@section('css_file')
    {{asset('assets/css/main_page_candidate_profileNew.min.css')}}
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

                {{--Personnal Informations--}}
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left">Données individuelles</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-informations-personnelles" href="#"><i class="fa fa-pen"> </i> Modifier </a>
                        </li>
                    </ul>
                    <div class="block-content borderColor tab-content">
                        <div class="tab-pane active" role="tabpanel">
                            <div class="row text-center d-none d-lg-flex">
                                <div class="col-1">
                                    <img class="img-avatar img-avatar128 img-avatar-thumb" @if(isset(Auth::user()->photo_Candidat )) src= "{{asset(Auth::user()->photo)}}" @else src = "{{asset('assets/media/photos/avatar16.jpg')}}" @endif alt="photoCandidat">
                                </div>
                                <div class="col-10 row mt-2 mb-2  text-justify ml-auto">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nom : </span>{{Auth::user()->nom_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Prénoms : </span>{{Auth::user()->prenoms_Candidat}}</div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Nationalité : </span>{{Auth::user()->nationalite_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Sexe : </span>{{Auth::user()->sexe_Candidat}}</div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Age : </span>{{Auth::user()->age}} ans</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{Auth::user()->lieu_Residence_Candidat}}</div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">E-mail : </span>{{Auth::user()->e_mail_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{Auth::user()->situation_Matrimoniale_Candidat}}</div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Téléphone : </span>{{Auth::user()->telephone_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-7"><span class="font-w700">Permis : </span>{{Auth::user()->permis_Candidat}}</div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-5"><span class="font-w700">Numero de piece : </span>{{Auth::user()->numero_Piece_Candidat}}</div>
                                </div>
                            </div>
                            <div class="row text-center d-lg-none d-flex">
                                <div class="col-12 row mt-2 mb-2  text-justify ">
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nom : </span>{{Auth::user()->nom_Candidat}}</div>
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Prénoms : </span>{{Auth::user()->prenoms_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Nationalité : </span>{{Auth::user()->nationalite_Candidat}}</div>
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Sexe : </span>{{Auth::user()->sexe_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Age : </span>{{Auth::user()->age}} ans</div>
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Lieu de résidence : </span>{{Auth::user()->lieu_Residence_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">E-mail : </span>{{Auth::user()->e_mail_Candidat}}</div>
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Situation matrimoniale : </span>{{Auth::user()->situation_Matrimoniale_Candidat}}</div>
                                    <div class="col-12 col-sm-5 col-md-5 col-lg-5"><span class="font-w700">Téléphone : </span>{{Auth::user()->telephone_Candidat}}</div>
                                    <div class="col-12 col-sm-7 col-md-7 col-lg-7"><span class="font-w700">Permis : </span>{{Auth::user()->permis_Candidat}}</div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12"><span class="font-w700">Numero de piece : </span>{{Auth::user()->numero_Piece_Candidat}}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Modify Personnal Informations-->
                    <div class="modal" id="modal-default-informations-personnelles" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Modifier les informations personnelles</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateInfo')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidatePersonnalInfo->first('Numero_Piece_Identite'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Numero_Piece_Identite')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('Nom'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Nom')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('Prenoms'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Prenoms')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('E-mail'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('E-mail')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('Telephone'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Telephone')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('Photo_Candidat'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Photo_Candidat')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidatePersonnalInfo->first('Naissance_Candidat'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidatePersonnalInfo->first('Naissance_Candidat')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="nom">Nom</label>
                                                <div class="input-group">
                                                    <input type="text"  class="form-control" id="nom" name="Nom" value="{{Auth::user()->nom_Candidat}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="prenoms">Prénoms</label>
                                                <div class="input-group">
                                                    <input type="text"  class="form-control" id="prenoms" name="Prenoms" value="{{Auth::user()->prenoms_Candidat}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="e-mail_candidat">E-mail</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control form-control-sm" id = "e-mail_candidat" name = "E-mail" value = "{{Auth::user()->e_mail_Candidat}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="telephone_candidat">Téléphone</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id = "telephone_candidat" name = "Telephone" value = "{{Auth::user()->telephone_Candidat}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_naissance_candidat">Date de naissance</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" id="date_naissance_candidat" name="Naissance_Candidat" value="{{Auth::user()->birth_day}}" min="1970-01-01" max="2005-01-01">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="sexe_candidat">Sexe</label>
                                                <div class="input-group">
                                                    <select  class="form-control" id="sexe_candidat" name="Sexe_Candidat">
                                                        <option value="MASCULIN" @if(isset(Auth::user()->sexe_Candidat)) @if(Auth::user()->sexe_Candidat == "MASCULIN") selected @endif @endif>MASCULIN</option>
                                                        <option value="FEMININ" @if(isset(Auth::user()->sexe_Candidat)) @if(Auth::user()->sexe_Candidat == "FEMININ") selected @endif @endif>FEMININ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="nationalite_candidat">Nationalité</label>
                                                <div class="input-group">
                                                    <select  class="form-control" id="nationalite_candidat" name="Nationalite_Candidat">
                                                        <option value="AUCUNE">--</option>
                                                        <option value={{Str::upper("Afghane")}}>{{Str::upper("Afghane")}}</option>
                                                        <option value={{Str::upper("Albanaise")}}>{{Str::upper("Albanaise")}}</option>
                                                        <option value={{Str::upper("Algérienne")}}>{{Str::upper("Algérienne")}}</option>
                                                        <option value={{Str::upper("Allemande")}}>{{Str::upper("Allemande")}}</option>
                                                        <option value={{Str::upper("Americaine")}}>{{Str::upper("Americaine")}}</option>
                                                        <option value={{Str::upper("Andorrane")}}>{{Str::upper("Andorrane")}}</option>
                                                        <option value={{Str::upper("Angolaise")}}>{{Str::upper("Angolaise")}}</option>
                                                        <option value={{Str::upper("Antiguaise-et-Barbudienne")}}>{{Str::upper("Antiguaise-et-Barbudienne")}}</option>
                                                        <option value={{Str::upper("Argentine")}}>{{Str::upper("Argentine")}}</option>
                                                        <option value={{Str::upper("Australienne")}}>{{Str::upper("Australienne")}}</option>
                                                        <option value={{Str::upper("Autrichienne")}}>{{Str::upper("Autrichienne")}}</option>
                                                        <option value={{Str::upper("Azerbaïdjanaise")}}>{{Str::upper("Azerbaïdjanaise")}}</option>
                                                        <option value={{Str::upper("Bahamienne")}}>{{Str::upper("Bahamienne")}}</option>
                                                        <option value={{Str::upper("Bahreinienne")}}>{{Str::upper("Bahreinienne")}}</option>
                                                        <option value={{Str::upper("Bangladaise")}}>{{Str::upper("Bangladaise")}}</option>
                                                        <option value={{Str::upper("Barbadienne")}}>{{Str::upper("Barbadienne")}}</option>
                                                        <option value={{Str::upper("Belge")}}>{{Str::upper("Belge")}}</option>
                                                        <option value={{Str::upper("Belizienne")}}>{{Str::upper("Belizienne")}}</option>
                                                        <option value={{Str::upper("Béninoise")}}>{{Str::upper("Béninoise")}}</option>
                                                        <option value={{Str::upper("Bhoutanaise")}}>{{Str::upper("Bhoutanaise")}}</option>
                                                        <option value={{Str::upper("Biélorusse")}}>{{Str::upper("Biélorusse")}}</option>
                                                        <option value={{Str::upper("Birmane")}}>{{Str::upper("Birmane")}}</option>
                                                        <option value={{Str::upper("Bissau-Guinéenne")}}>{{Str::upper("Bissau-Guinéenne")}}</option>
                                                        <option value={{Str::upper("Bolivienne")}}>{{Str::upper("Bolivienne")}}</option>
                                                        <option value={{Str::upper("Bosnienne")}}>{{Str::upper("Bosnienne")}}</option>
                                                        <option value={{Str::upper("Botswanaise")}}>{{Str::upper("Botswanaise")}}</option>
                                                        <option value={{Str::upper("Brésilienne")}}>{{Str::upper("Brésilienne")}}</option>
                                                        <option value={{Str::upper("Britannique")}}>{{Str::upper("Britannique")}}</option>
                                                        <option value={{Str::upper("Brunéienne")}}>{{Str::upper("Brunéienne")}}</option>
                                                        <option value={{Str::upper("Bulgare")}}>{{Str::upper("Bulgare")}}</option>
                                                        <option value={{Str::upper("Burkinabée")}}>{{Str::upper("Burkinabée")}}</option>
                                                        <option value={{Str::upper("Burundaise")}}>{{Str::upper("Burundaise")}}</option>
                                                        <option value={{Str::upper("Cambodgienne")}}>{{Str::upper("Cambodgienne")}}</option>
                                                        <option value={{Str::upper("Camerounaise")}}>{{Str::upper("Camerounaise")}}</option>
                                                        <option value={{Str::upper("Canadienne")}}>{{Str::upper("Canadienne")}}</option>
                                                        <option value={{Str::upper("verdienne")}}>{{Str::upper("Cap-verdienne")}}</option>
                                                        <option value={{Str::upper("Centrafricaine")}}>{{Str::upper("Centrafricaine")}}</option>
                                                        <option value={{Str::upper("Chilienne")}}>{{Str::upper("Chilienne")}}</option>
                                                        <option value={{Str::upper("Chinoise")}}>{{Str::upper("Chinoise")}}</option>
                                                        <option value={{Str::upper("Chypriote")}}>{{Str::upper("Chypriote")}}</option>
                                                        <option value={{Str::upper("Colombienne")}}>{{Str::upper("Colombienne")}}</option>
                                                        <option value={{Str::upper("Comorienne")}}>{{Str::upper("Comorienne")}}</option>
                                                        <option value={{Str::upper("Congolaise")}}>{{Str::upper("Congolaise")}}</option>
                                                        <option value={{Str::upper("Congolaise")}}>{{Str::upper("Congolaise")}}</option>
                                                        <option value={{Str::upper("Cookienne")}}>{{Str::upper("Cookienne")}}</option>
                                                        <option value={{Str::upper("Costaricaine")}}>{{Str::upper("Costaricaine")}}</option>
                                                        <option value={{Str::upper("Croate")}}>{{Str::upper("Croate")}}</option>
                                                        <option value={{Str::upper("Cubaine")}}>{{Str::upper("Cubaine")}}</option>
                                                        <option value={{Str::upper("Danoise")}}>{{Str::upper("Danoise")}}</option>
                                                        <option value={{Str::upper("Djiboutienne")}}>{{Str::upper("Djiboutienne")}}</option>
                                                        <option value={{Str::upper("Dominicaine")}}>{{Str::upper("Dominicaine")}}</option>
                                                        <option value={{Str::upper("Dominiquaise")}}>{{Str::upper("Dominiquaise")}}</option>
                                                        <option value={{Str::upper("Égyptienne")}}>{{Str::upper("Égyptienne")}}</option>
                                                        <option value={{Str::upper("Émirienne")}}>{{Str::upper("Émirienne")}}</option>
                                                        <option value={{Str::upper("Équato-guineenne")}}>{{Str::upper("Équato-guineenne")}}</option>
                                                        <option value={{Str::upper("Équatorienne")}}>{{Str::upper("Équatorienne")}}</option>
                                                        <option value={{Str::upper("Érythréenne")}}>{{Str::upper("Érythréenne")}}</option>
                                                        <option value={{Str::upper("Espagnole")}}>{{Str::upper("Espagnole")}}</option>
                                                        <option value={{Str::upper("Est-timoraise")}}>{{Str::upper("Est-timoraise")}}</option>
                                                        <option value={{Str::upper("Estonienne")}}>{{Str::upper("Estonienne")}}</option>
                                                        <option value={{Str::upper("Éthiopienne")}}>{{Str::upper("Éthiopienne")}}</option>
                                                        <option value={{Str::upper("Fidjienne")}}>{{Str::upper("Fidjienne")}}</option>
                                                        <option value={{Str::upper("Française")}}>{{Str::upper("Française")}}</option>
                                                        <option value={{Str::upper("Finlandaise")}}>{{Str::upper("Finlandaise")}}</option>
                                                        <option value={{Str::upper("Gabonaise")}}>{{Str::upper("Gabonaise")}}</option>
                                                        <option value={{Str::upper("Gambienne")}}>{{Str::upper("Gambienne")}}</option>
                                                        <option value={{Str::upper("Georgienne")}}>{{Str::upper("Georgienne")}}</option>
                                                        <option value={{Str::upper("Ghanéenne")}}>{{Str::upper("Ghanéenne")}}</option>
                                                        <option value={{Str::upper("Grenadienne")}}>{{Str::upper("Grenadienne")}}</option>
                                                        <option value={{Str::upper("Guatémaltèque")}}>{{Str::upper("Guatémaltèque")}}</option>
                                                        <option value={{Str::upper("Guinéenne")}}>{{Str::upper("Guinéenne")}}</option>
                                                        <option value={{Str::upper("Guyanienne")}}>{{Str::upper("Guyanienne")}}</option>
                                                        <option value={{Str::upper("Haïtienne")}}>{{Str::upper("Haïtienne")}}</option>
                                                        <option value={{Str::upper("Hellénique")}}>{{Str::upper("Hellénique")}}</option>
                                                        <option value={{Str::upper("Hondurienne")}}>{{Str::upper("Hondurienne")}}</option>
                                                        <option value={{Str::upper("Hongroise")}}>{{Str::upper("Hongroise")}}</option>
                                                        <option value={{Str::upper("Indienne")}}>{{Str::upper("Indienne")}}</option>
                                                        <option value={{Str::upper("Indonésienne")}}>{{Str::upper("Indonésienne")}}</option>
                                                        <option value={{Str::upper("Irakienne")}}>{{Str::upper("Irakienne")}}</option>
                                                        <option value={{Str::upper("Iranienne")}}>{{Str::upper("Iranienne")}}</option>
                                                        <option value={{Str::upper("Irlandaise")}}>{{Str::upper("Irlandaise")}}</option>
                                                        <option value={{Str::upper("Islandaise")}}>{{Str::upper("Islandaise")}}</option>
                                                        <option value={{Str::upper("Israélienne")}}>{{Str::upper("Israélienne")}}</option>
                                                        <option value={{Str::upper("Italienne")}}>{{Str::upper("Italienne")}}</option>
                                                        <option value={{Str::upper("Ivoirienne")}}>{{Str::upper("Ivoirienne")}}</option>
                                                        <option value={{Str::upper("Jamaïcaine")}}>{{Str::upper("Jamaïcaine")}}</option>
                                                        <option value={{Str::upper("Japonaise")}}>{{Str::upper("Japonaise")}}</option>
                                                        <option value={{Str::upper("Jordanienne")}}>{{Str::upper("Jordanienne")}}</option>
                                                        <option value={{Str::upper("Kazakhstanaise")}}>{{Str::upper("Kazakhstanaise")}}</option>
                                                        <option value={{Str::upper("Kenyane")}}>{{Str::upper("Kenyane")}}</option>
                                                        <option value={{Str::upper("Kirghize")}}>{{Str::upper("Kirghize")}}</option>
                                                        <option value={{Str::upper("Kiribatienne")}}>{{Str::upper("Kiribatienne")}}</option>
                                                        <option value={{Str::upper("Kittitienne et Névicienne")}}>{{Str::upper("Kittitienne et Névicienne")}}</option>
                                                        <option value={{Str::upper("Koweïtienne")}}>{{Str::upper("Koweïtienne")}}</option>
                                                        <option value={{Str::upper("Laotienne")}}>{{Str::upper("Laotienne")}}</option>
                                                        <option value={{Str::upper("Lesothane")}}>{{Str::upper("Lesothane")}}</option>
                                                        <option value={{Str::upper("Lettone")}}>{{Str::upper("Lettone")}}</option>
                                                        <option value={{Str::upper("Libanaise")}}>{{Str::upper("Libanaise")}}</option>
                                                        <option value={{Str::upper("Libérienne")}}>{{Str::upper("Libérienne")}}</option>
                                                        <option value={{Str::upper("Libyenne")}}>{{Str::upper("Libyenne")}}</option>
                                                        <option value={{Str::upper("Liechtensteinoise")}}>{{Str::upper("Liechtensteinoise")}}</option>
                                                        <option value={{Str::upper("Lituanienne")}}>{{Str::upper("Lituanienne")}}</option>
                                                        <option value={{Str::upper("Luxembourgeoise")}}>{{Str::upper("Luxembourgeoise")}}</option>
                                                        <option value={{Str::upper("Macédonienne")}}>{{Str::upper("Macédonienne")}}</option>
                                                        <option value={{Str::upper("Malaisienne")}}>{{Str::upper("Malaisienne")}}</option>
                                                        <option value={{Str::upper("Malawienne")}}>{{Str::upper("Malawienne")}}</option>
                                                        <option value={{Str::upper("Maldivienne")}}>{{Str::upper("Maldivienne")}}</option>
                                                        <option value={{Str::upper("Malgache")}}>{{Str::upper("Malgache")}}</option>
                                                        <option value={{Str::upper("Malienne")}}>{{Str::upper("Malienne")}}</option>
                                                        <option value={{Str::upper("Maltaise")}}>{{Str::upper("Maltaise")}}</option>
                                                        <option value={{Str::upper("Marocaine")}}>{{Str::upper("Marocaine")}}</option>
                                                        <option value={{Str::upper("Marshallaise")}}>{{Str::upper("Marshallaise")}}</option>
                                                        <option value={{Str::upper("Marshallaise")}}>{{Str::upper("Mauricienne")}}</option>
                                                        <option value={{Str::upper("Mauritanienne")}}>{{Str::upper("Mauritanienne")}}</option>
                                                        <option value={{Str::upper("Mexicaine")}}>{{Str::upper("Mexicaine")}}</option>
                                                        <option value={{Str::upper("FSM")}}>{{Str::upper("Micronésienne")}}</option>
                                                        <option value={{Str::upper("Moldave")}}>{{Str::upper("Moldave")}}</option>
                                                        <option value={{Str::upper("Monegasque")}}>{{Str::upper("Monegasque")}}</option>
                                                        <option value={{Str::upper("Mongole")}}>{{Str::upper("Mongole")}}</option>
                                                        <option value={{Str::upper("Monténégrine")}}>{{Str::upper("Monténégrine")}}</option>
                                                        <option value={{Str::upper("Mozambicaine")}}>{{Str::upper("Mozambicaine")}}</option>
                                                        <option value={{Str::upper("Namibienne")}}>{{Str::upper("Namibienne")}}</option>
                                                        <option value={{Str::upper("Nauruane")}}>{{Str::upper("Nauruane")}}</option>
                                                        <option value={{Str::upper("Néerlandaise")}}>{{Str::upper("Néerlandaise")}}</option>
                                                        <option value={{Str::upper("Néo-Zélandaise")}}>{{Str::upper("Néo-Zélandaise")}}</option>
                                                        <option value={{Str::upper("Népalaise")}}>{{Str::upper("Népalaise")}}</option>
                                                        <option value={{Str::upper("Nicaraguayenne")}}>{{Str::upper("Nicaraguayenne")}}</option>
                                                        <option value={{Str::upper("Nigériane")}}>{{Str::upper("Nigériane")}}</option>
                                                        <option value={{Str::upper("Nigérienne")}}>{{Str::upper("Nigérienne")}}</option>
                                                        <option value={{Str::upper("Niuéenne")}}>{{Str::upper("Niuéenne")}}</option>
                                                        <option value={{Str::upper("Nord-coréenne")}}>{{Str::upper("Nord-coréenne")}}</option>
                                                        <option value={{Str::upper("Norvégienne")}}>{{Str::upper("Norvégienne")}}</option>
                                                        <option value={{Str::upper("Omanaise")}}>{{Str::upper("Omanaise")}}</option>
                                                        <option value={{Str::upper("Ougandaise")}}>{{Str::upper("Ougandaise")}}</option>
                                                        <option value={{Str::upper("Ouzbéke")}}>{{Str::upper("Ouzbéke")}}</option>
                                                        <option value={{Str::upper("Pakistanaise")}}>{{Str::upper("Pakistanaise")}}</option>
                                                        <option value={{Str::upper("Palaosienne")}}>{{Str::upper("Palaosienne")}}</option>
                                                        <option value={{Str::upper("Palestinienne")}}>{{Str::upper("Palestinienne")}}</option>
                                                        <option value={{Str::upper("Panaméenne")}}>{{Str::upper("Panaméenne")}}</option>
                                                        <option value={{Str::upper("Papouane-Néo-Guinéenne")}}>{{Str::upper("Papouane-Néo-Guinéenne")}}</option>
                                                        <option value={{Str::upper("Paraguayenne")}}>{{Str::upper("Paraguayenne")}}</option>
                                                        <option value={{Str::upper("Péruvienne")}}>{{Str::upper("Péruvienne")}}</option>
                                                        <option value={{Str::upper("Philippine")}}>{{Str::upper("Philippine")}}</option>
                                                        <option value={{Str::upper("Polonaise")}}>{{Str::upper("Polonaise")}}</option>
                                                        <option value={{Str::upper("Portugaise")}}>{{Str::upper("Portugaise")}}</option>
                                                        <option value={{Str::upper("Qatarienne")}}>{{Str::upper("Qatarienne")}}</option>
                                                        <option value={{Str::upper("Roumaine")}}>{{Str::upper("Roumaine")}}</option>
                                                        <option value={{Str::upper("Russe")}}>{{Str::upper("Russe")}}</option>
                                                        <option value={{Str::upper("Rwandaise")}}>{{Str::upper("Rwandaise")}}</option>
                                                        <option value={{Str::upper("Saint-Lucienne")}}>{{Str::upper("Saint-Lucienne")}}</option>
                                                        <option value={{Str::upper("Saint-Marinaise")}}>{{Str::upper("Saint-Marinaise")}}</option>
                                                        <option value={{Str::upper("Saint-Vincentaise et Grenadine")}}>{{Str::upper("Saint-Vincentaise et Grenadine")}}</option>
                                                        <option value={{Str::upper("Salomonaise")}}>{{Str::upper("Salomonaise")}}</option>
                                                        <option value={{Str::upper("Salvadorienne")}}>{{Str::upper("Salvadorienn")}}e</option>
                                                        <option value={{Str::upper("Samoane")}}>{{Str::upper("Samoane")}}</option>
                                                        <option value={{Str::upper("Santoméenne")}}>{{Str::upper("Santoméenne")}}</option>
                                                        <option value={{Str::upper("Saoudienne")}}>{{Str::upper("Saoudienne")}}</option>
                                                        <option value={{Str::upper("Sénégalaise")}}>{{Str::upper("Sénégalaise")}}</option>
                                                        <option value={{Str::upper("Serbe")}}>{{Str::upper("Serbe")}}</option>
                                                        <option value={{Str::upper("Seychelloise")}}>{{Str::upper("Seychelloise")}}</option>
                                                        <option value={{Str::upper("Sierra-Léonaise")}}>{{Str::upper("Sierra-Léonaise")}}</option>
                                                        <option value={{Str::upper("Singapourienne")}}>{{Str::upper("Singapourienne")}}</option>
                                                        <option value={{Str::upper("Slovaque")}}>{{Str::upper("Slovaque")}}</option>
                                                        <option value={{Str::upper("Slovène")}}>{{Str::upper("Slovène")}}</option>
                                                        <option value={{Str::upper("Somalienne")}}>{{Str::upper("Somalienne")}}</option>
                                                        <option value={{Str::upper("Soudanaise")}}>{{Str::upper("Soudanaise")}}</option>
                                                        <option value={{Str::upper("Sri-Lankaise")}}>{{Str::upper("Sri-Lankaise")}}</option>
                                                        <option value={{Str::upper("Sud-Africaine")}}>{{Str::upper("Sud-Africaine")}}</option>
                                                        <option value={{Str::upper("Sud-Coréenne")}}>{{Str::upper("Sud-Coréenne")}}</option>
                                                        <option value={{Str::upper("Sud-Soudanaise")}}>{{Str::upper("Sud-Soudanaise")}}</option>
                                                        <option value={{Str::upper("Suédoise")}}>{{Str::upper("Suédoise")}}</option>
                                                        <option value={{Str::upper("Suisse")}}>{{Str::upper("Suisse")}}</option>
                                                        <option value={{Str::upper("Surinamaise")}}>{{Str::upper("Surinamaise")}}</option>
                                                        <option value={{Str::upper("Swazie")}}>{{Str::upper("Swazie")}}</option>
                                                        <option value={{Str::upper("Syrienne")}}>{{Str::upper("Syrienne")}}</option>
                                                        <option value={{Str::upper("Tadjike")}}>{{Str::upper("Tadjike")}}</option>
                                                        <option value={{Str::upper("Tanzanienne")}}>{{Str::upper("Tanzanienne")}}</option>
                                                        <option value={{Str::upper("Tchadienne")}}>{{Str::upper("Tchadienne")}}</option>
                                                        <option value={{Str::upper("Tchèque")}}>{{Str::upper("Tchèque")}}</option>
                                                        <option value={{Str::upper("Thaïlandaise")}}>{{Str::upper("Thaïlandaise")}}</option>
                                                        <option value={{Str::upper("Togolaise")}}>{{Str::upper("Togolaise")}}</option>
                                                        <option value={{Str::upper("Tonguienne")}}>{{Str::upper("Tonguienne")}}</option>
                                                        <option value={{Str::upper("Trinidadienne")}}>{{Str::upper("Trinidadienne")}}</option>
                                                        <option value={{Str::upper("Tunisienne")}}>{{Str::upper("Tunisienne")}}</option>
                                                        <option value={{Str::upper("Turkmène")}}>{{Str::upper("Turkmène")}}</option>
                                                        <option value={{Str::upper("Turque")}}>{{Str::upper("Turque")}}</option>
                                                        <option value={{Str::upper("Tuvaluane")}}>{{Str::upper("Tuvaluane")}}</option>
                                                        <option value={{Str::upper("Ukrainienne")}}>{{Str::upper("Ukrainienne")}}</option>
                                                        <option value={{Str::upper("Uruguayenne")}}>{{Str::upper("Uruguayenne")}}</option>
                                                        <option value={{Str::upper("Vanuatuane")}}>{{Str::upper("Vanuatuane")}}</option>
                                                        <option value={{Str::upper("Vaticane")}}>{{Str::upper("Vaticane")}}</option>
                                                        <option value={{Str::upper("Vénézuélienne")}}>{{Str::upper("Vénézuélienne")}}</option>
                                                        <option value={{Str::upper("Vietnamienne")}}>{{Str::upper("Vietnamienne")}}</option>
                                                        <option value={{Str::upper("Yéménite")}}>{{Str::upper("Yéménite")}}</option>
                                                        <option value={{Str::upper("Zambienne")}}>{{Str::upper("Zambienne")}}</option>
                                                        <option value={{Str::upper("Zimbabwéenne")}}>{{Str::upper("Zimbabwéenne")}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="situation_matrimoniale_candidat">Situation matrimoniale</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="situation_matrimoniale_candidat" name="Situation_Matrimoniale_Candidat">
                                                        <option value="CÉLIBATAIRE SANS ENFANT" @if(isset(Auth::user()->situation_Matrimoniale_Candidat)) @if(Auth::user()->situation_Matrimoniale_Candidat == "CÉLIBATAIRE SANS ENFANT")selected @endif @endif >CÉLIBATAIRE SANS ENFANT</option>
                                                        <option value="CÉLIBATAIRE AVEC ENFANT" @if(isset(Auth::user()->situation_Matrimoniale_Candidat)) @if(Auth::user()->situation_Matrimoniale_Candidat == "CÉLIBATAIRE SANS ENFANT")selected @endif @endif>CÉLIBATAIRE AVEC ENFANT</option>
                                                        <option value="MARIÉ SANS ENFANT" @if(isset(Auth::user()->situation_Matrimoniale_Candidat)) @if(Auth::user()->situation_Matrimoniale_Candidat == "CÉLIBATAIRE SANS ENFANT")selected @endif @endif>MARIÉ SANS ENFANT</option>
                                                        <option value="MARIÉ AVEC ENFANT" @if(isset(Auth::user()->situation_Matrimoniale_Candidat)) @if(Auth::user()->situation_Matrimoniale_Candidat == "MARIÉ AVEC ENFANT")selected @endif @endif>MARIÉ AVEC ENFANT</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="lieu_residence_candidat">Lieu de résidence</label>
                                                <div class="input-group">
                                                    <select  class="form-control" id="lieu_residence_candidat" name="lieu_residence_Candidat">
                                                        <option value="ABOBO"  @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "ABOBO")selected @endif @endif>ABOBO</option>
                                                        <option value="ADJAMÉ" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "ADJAMÉ")selected @endif @endif>ADJAMÉ</option>
                                                        <option value="ANYAMA" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "ANYAMA")selected @endif @endif>ANYAMA</option>
                                                        <option value="ATTÉCOUBÉ" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "ATTÉCOUBÉ")selected @endif @endif>ATTÉCOUBÉ</option>
                                                        <option value="BINGERVILLE" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "BINGERVILLE")selected @endif @endif>BINGERVILLE</option>
                                                        <option value="COCODY" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "COCODY")selected @endif @endif>COCODY</option>
                                                        <option value="KOUMASSI" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "KOUMASSI")selected @endif @endif>KOUMASSI</option>
                                                        <option value="MARCORY" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "MARCORY")selected @endif @endif>MARCORY</option>
                                                        <option value="PLATEAU" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "PLATEAU")selected @endif @endif>PLATEAU</option>
                                                        <option value="PORT BOUËT" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "PORT BOUËT")selected @endif @endif>PORT BOUËT</option>
                                                        <option value="TREICHVILLE" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "TREICHVILLE")selected @endif @endif>TREICHVILLE</option>
                                                        <option value="SONGON" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "SONGON")selected @endif @endif>SONGON</option>
                                                        <option value="YOPOUGON" @if(isset(Auth::user()->lieu_Residence_Candidat)) @if(Auth::user()->lieu_Residence_Candidat == "YOPOUGON")selected @endif @endif>YOPOUGON</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="permis_candidat">Permis de conduire</label>
                                                <div class="input-group">
                                                    <select  class="form-control" id="permis_candidat" name="Permis_Candidat">
                                                        <option value="SANS PERMIS" @if(isset(Auth::user()->permis_Candidat)) @if(Auth::user()->permis_Candidat == "SANS PERMIS")selected @endif @endif>SANS PERMIS</option>
                                                        <option value="PERMIS A" @if(isset(Auth::user()->permis_Candidat)) @if(Auth::user()->permis_Candidat == "PERMIS A")selected @endif @endif>PERMIS A</option>
                                                        <option value="PERMIS B" @if(isset(Auth::user()->permis_Candidat)) @if(Auth::user()->permis_Candidat == "PERMIS B")selected @endif @endif>PERMIS B</option>
                                                        <option value="PERMIS C" @if(isset(Auth::user()->permis_Candidat)) @if(Auth::user()->permis_Candidat == "PERMIS C")selected @endif @endif>PERMIS C</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="numero_piece">Numéro de la pièce d'identité</label>
                                                <div class="input-group">
                                                    <input type="text"  class="form-control" id="numero_piece" name="Numero_Piece_Identite" value="{{Auth::user()->numero_Piece_Candidat}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="photo_candidat">Photo</label>
                                                <div class="input-group">
                                                    <input type="file" id="photo_candidat" name="Photo_Candidat">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{--End Personnal Informations--}}

                <!-- Certifications -->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Certifications</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Certification" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneCertification" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">
                                            N°
                                        </th>
                                        <th style="width: 25%;">Organisation</th>
                                        <th style="width: 30%;">Certification</th>
                                        <th style="width: 15%;">Date de début</th>
                                        <th style="width: 15%;">Date de fin</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $certifications as $certification)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$certification->organisation_Certification}}</td>
                                            <td>{{$certification->intitule_Certification}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $certification->date_Debut_Certification)->format('d-m-Y')}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $certification->date_Fin_Certification)->format('d-m-Y')}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-Certification{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-Certification{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach( $certifications as $certification)
                                <!--Modify a certification-->
                                <div class="modal" id="modal-default-modify-Certification{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier la certification</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('ModifyCandidateCertification',['id' => $certification->id_Certification])}}">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyCandidateCertification->first('intitule_Certification'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyCandidateCertification->first('intitule_Certification')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyCandidateCertification->first('organisation_Certification'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyCandidateCertification->first('organisation_Certification')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="intitule_modify_certification{{$loop->iteration}}">Intitulé</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="intitule_modify_certification{{$loop->iteration}}" name="intitule_Certification" value="{{$certification->intitule_Certification}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="organisation_modify_certification{{$loop->iteration}}">Organisation</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="organisation_modify_certification{{$loop->iteration}}" name="organisation_Certification" value="{{$certification->organisation_Certification}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="date_debut_modify_certification{{$loop->iteration}}">Date de début</label>
                                                            <div class="input-group">
                                                                <input class="form-control" type="date" id="date_debut_modify_certification{{$loop->iteration}}" name="date_Debut_Certification" value="{{$certification->debutCertification}}" min="1985-01-01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="date_fin_modify_certification{{$loop->iteration}}">Date de fin (à préciser si la certification a expiré)</label>
                                                            <div class="input-group">
                                                                <input class="form-control" type="date" id="date_fin_modify_certification{{$loop->iteration}}"  name="date_Fin_Certification" min="1985-01-01" value="{{$certification->finCertification}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!--End Modify a certification-->

                                <!--Delete a certification-->
                                <div class="modal" id="modal-default-delete-Certification{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer la certification ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteCandidateCertification',['id' => $certification->id_Certification])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA CERTIFICATION</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--End Delete a certification-->
                            @endforeach
                            <!-- ending informations about certification-->
                        </div>
                    </div>

                    <!--Add Certification Form-->
                    <div class="modal" id="modal-default-add-Certification" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter une certification</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateCertification')}}">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidateCertification->first('intitule_Certification'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCertification->first('intitule_Certification')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateCertification->first('organisation_Certification'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCertification->first('organisation_Certification')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateCertification->first('date_Debut_Certification'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCertification->first('date_Debut_Certification')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateCertification->first('date_Fin_Certification'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCertification->first('date_Fin_Certification')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="intitule_add_certification">Intitulé</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="intitule_add_certification" name="intitule_Certification" value="{{old('intitule_Certification')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="organisation_add_certification">Organisation</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="organisation_add_certification" name="organisation_Certification" value="{{old('organisation_Certification')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_debut_add_certification">Date de début</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" id="date_debut_add_certification" name="date_Debut_Certification" value="{{old('date_Debut_Certification')}}" min="1985-01-01">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_fin_add_certification">Date de fin (à préciser si la certification a expiré)</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" id="date_fin_add_certification" name="date_Fin_Certification" value="{{old('date_Fin_Certification')}}" min="1985-01-01">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Certification Form-->
                </div>
                <!-- End Certifications -->

                <!-- Formations-->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Formations</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Formation" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneFormation" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">N°</th>
                                        <th style="width: 20%;">Intitulé</th>
                                        <th style="width: 15%;">Établissement</th>
                                        <th style="width: 10%;">Diplôme</th>
                                        <th style="width: 15%;">Lieu</th>
                                        <th style="width: 15%;">Date de début</th>
                                        <th style="width: 10%;">Date de fin</th>
                                        <th class="text-center" style="width: 10%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $formations as $formation)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$formation->intitule_Formation}}</td>
                                            <td>{{$formation->etablissement_Formation}}</td>
                                            <td>{{$formation->diplome_Formation}}</td>
                                            <td>{{$formation->lieu_Formation}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $formation->date_Debut_Formation)->format('d-m-Y')}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $formation->date_Fin_Formation)->format('d-m-Y')}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-Formation{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-Formation{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @foreach( $formations as $formation)
                                <!--Modify a Formation-->
                                    <div class="modal" id="modal-default-modify-Formation{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier la formation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" method="post" action="{{Route('ModifyCandidateFormation',['id' => $formation->id_Formation])}}">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyCandidateFormation->first('intitule_Formation'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateFormation->first('intitule_Formation')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateFormation->first('etablissement_Formation'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateFormation->first('etablissement_Formation')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateFormation->first('date_Debut_Formation'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateFormation->first('date_Debut_Formation')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateFormation->first('date_Fin_Formation'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateFormation->first('date_Fin_Formation')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="intitule_modify_Formation{{$loop->iteration}}">Intitulé</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="intitule_modify_Formation{{$loop->iteration}}" name="intitule_Formation" value="{{$formation->intitule_Formation}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="etablissement-modify-Formation{{$loop->iteration}}">Établissement</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="etablissement-modify-Formation{{$loop->iteration}}" name="etablissement_Formation" value="{{$formation->etablissement_Formation}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="diplome_modify_Formation{{$loop->iteration}}">Diplôme</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="diplome_modify_Formation{{$loop->iteration}}" name="diplome_Formation">
                                                                        <option value="BAC E" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "BAC E")selected @endif @endif>BAC E</option>
                                                                        <option value="BAC D" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "BAC D")selected @endif @endif>BAC D</option>
                                                                        <option value="BAC C" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "BAC C")selected @endif @endif>BAC C</option>
                                                                        <option value="BAC A" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "BAC A")selected @endif @endif>BAC A</option>
                                                                        <option value="DUT" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "DUT")selected @endif @endif>DUT</option>
                                                                        <option value="BTS" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "BTS")selected @endif @endif>BTS</option>
                                                                        <option value="LICENCE" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "LICENCE")selected @endif @endif>LICENCE</option>
                                                                        <option value="MASTER" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "MASTER")selected @endif @endif>MASTER</option>
                                                                        <option value="DOCTORAT" @if(isset($formation->diplome_Formation)) @if($formation->diplome_Formation == "DOCTORAT")selected @endif @endif>DOCTORAT</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="Lieu-modify-Formation1">Lieu</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="Lieu-modify-Formation1" name="lieu_Formation">
                                                                        <option value="AUCUN">--</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Afrique_Centrale">Afrique_Centrale</option>
                                                                        <option value="Afrique_du_sud">Afrique_du_Sud</option>
                                                                        <option value="Albanie">Albanie</option>
                                                                        <option value="Algerie">Algerie</option>
                                                                        <option value="Allemagne">Allemagne</option>
                                                                        <option value="Andorre">Andorre</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Arabie_Saoudite">Arabie_Saoudite</option>
                                                                        <option value="Argentine">Argentine</option>
                                                                        <option value="Armenie">Armenie</option>
                                                                        <option value="Australie">Australie</option>
                                                                        <option value="Autriche">Autriche</option>
                                                                        <option value="Azerbaidjan">Azerbaidjan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbade">Barbade</option>
                                                                        <option value="Bahrein">Bahrein</option>
                                                                        <option value="Belgique">Belgique</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermudes">Bermudes</option>
                                                                        <option value="Bielorussie">Bielorussie</option>
                                                                        <option value="Bolivie">Bolivie</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bhoutan">Bhoutan</option>
                                                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine</option>
                                                                        <option value="Bresil">Bresil</option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgarie">Bulgarie</option>
                                                                        <option value="Burkina_Faso">Burkina_Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Caiman">Caiman</option>
                                                                        <option value="Cambodge">Cambodge</option>
                                                                        <option value="Cameroun">Cameroun</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Canaries">Canaries</option>
                                                                        <option value="Cap_vert">Cap_Vert</option>
                                                                        <option value="Chili">Chili</option>
                                                                        <option value="Chine">Chine</option>
                                                                        <option value="Chypre">Chypre</option>
                                                                        <option value="Colombie">Colombie</option>
                                                                        <option value="Comores">Colombie</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Congo_democratique">Congo_democratique</option>
                                                                        <option value="Cook">Cook</option>
                                                                        <option value="Coree_du_Nord">Coree_du_Nord</option>
                                                                        <option value="Coree_du_Sud">Coree_du_Sud</option>
                                                                        <option value="Costa_Rica">Costa_Rica</option>
                                                                        <option value="Cote d'Ivoire">Côte d'Ivoire</option>
                                                                        <option value="Croatie">Croatie</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Danemark">Danemark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominique">Dominique</option>
                                                                        <option value="Egypte">Egypte</option>
                                                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis</option>
                                                                        <option value="Equateur">Equateur</option>
                                                                        <option value="Erythree">Erythree</option>
                                                                        <option value="Espagne">Espagne</option>
                                                                        <option value="Estonie">Estonie</option>
                                                                        <option value="Etats_Unis">Etats_Unis</option>
                                                                        <option value="Ethiopie">Ethiopie</option>
                                                                        <option value="Falkland">Falkland</option>
                                                                        <option value="Feroe">Feroe</option>
                                                                        <option value="Fidji">Fidji</option>
                                                                        <option value="Finlande">Finlande</option>
                                                                        <option value="France">France</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambie">Gambie</option>
                                                                        <option value="Georgie">Georgie</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Grece">Grece</option>
                                                                        <option value="Grenade">Grenade</option>
                                                                        <option value="Groenland">Groenland</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guernesey">Guernesey</option>
                                                                        <option value="Guinee">Guinee</option>
                                                                        <option value="Guinee_Bissau">Guinee_Bissau</option>
                                                                        <option value="Guinee equatoriale">Guinee_Equatoriale</option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Guyane_Francaise ">Guyane_Francaise</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Hawaii">Hawaii</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong_Kong">Hong_Kong</option>
                                                                        <option value="Hongrie">Hongrie</option>
                                                                        <option value="Inde">Inde</option>
                                                                        <option value="Indonesie">Indonesie</option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Irlande">Irlande</option>
                                                                        <option value="Islande">Islande</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italie">italie</option>
                                                                        <option value="Jamaique">Jamaique</option>
                                                                        <option value="Jan Mayen">Jan Mayen</option>
                                                                        <option value="Japon">Japon</option>
                                                                        <option value="Jersey">Jersey</option>
                                                                        <option value="Jordanie">Jordanie</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kirghizstan">Kirghizistan</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="Koweit">Koweit</option>
                                                                        <option value="Laos">Laos</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Lettonie">Lettonie</option>
                                                                        <option value="Liban">Liban</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                                        <option value="Lituanie">Lituanie</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Lybie">Lybie</option>
                                                                        <option value="Macao">Macao</option>
                                                                        <option value="Macedoine">Macedoine</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Madère">Madère</option>
                                                                        <option value="Malaisie">Malaisie</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malte">Malte</option>
                                                                        <option value="Man">Man</option>
                                                                        <option value="Mariannes du Nord">Mariannes du Nord</option>
                                                                        <option value="Maroc">Maroc</option>
                                                                        <option value="Marshall">Marshall</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Maurice">Maurice</option>
                                                                        <option value="Mauritanie">Mauritanie</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexique">Mexique</option>
                                                                        <option value="Micronesie">Micronesie</option>
                                                                        <option value="Midway">Midway</option>
                                                                        <option value="Moldavie">Moldavie</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolie">Mongolie</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Namibie">Namibie</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk">Norfolk</option>
                                                                        <option value="Norvege">Norvege</option>
                                                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie</option>
                                                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Ouganda">Ouganda</option>
                                                                        <option value="Ouzbekistan">Ouzbekistan</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestine">Palestine</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee</option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Pays_Bas">Pays_Bas</option>
                                                                        <option value="Perou">Perou</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pologne">Pologne</option>
                                                                        <option value="Polynesie">Polynesie</option>
                                                                        <option value="Porto_Rico">Porto_Rico</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Republique_Dominicaine">Republique_Dominicaine</option>
                                                                        <option value="Republique_Tcheque">Republique_Tcheque</option>
                                                                        <option value="Reunion">Reunion</option>
                                                                        <option value="Roumanie">Roumanie</option>
                                                                        <option value="Royaume_Uni">Royaume_Uni</option>
                                                                        <option value="Russie">Russie</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Sahara Occidental">Sahara Occidental</option>
                                                                        <option value="Sainte_Lucie">Sainte_Lucie</option>
                                                                        <option value="Saint_Marin">Saint_Marin</option>
                                                                        <option value="Salomon">Salomon</option>
                                                                        <option value="Salvador">Salvador</option>
                                                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                                        <option value="Samoa_Americaine">Samoa_Americaine</option>
                                                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapour">Singapour</option>
                                                                        <option value="Slovaquie">Slovaquie</option>
                                                                        <option value="Slovenie">Slovenie</option>
                                                                        <option value="Somalie">Somalie</option>
                                                                        <option value="Soudan">Soudan</option>
                                                                        <option value="Sri_Lanka">Sri_Lanka</option>
                                                                        <option value="Suede">Suede</option>
                                                                        <option value="Suisse">Suisse</option>
                                                                        <option value="Surinam">Surinam</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Syrie">Syrie</option>
                                                                        <option value="Tadjikistan">Tadjikistan</option>
                                                                        <option value="Taiwan">Taiwan</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Tanzanie">Tanzanie</option>
                                                                        <option value="Tchad">Tchad</option>
                                                                        <option value="Thailande">Thailande</option>
                                                                        <option value="Tibet">Tibet</option>
                                                                        <option value="Timor_Oriental">Timor_Oriental</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago</option>
                                                                        <option value="Tristan da cunha">Tristan de cuncha</option>
                                                                        <option value="Tunisie">Tunisie</option>
                                                                        <option value="Turkmenistan">Turmenistan</option>
                                                                        <option value="Turquie">Turquie</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican">Vatican</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vierges_Americaines">Vierges_Americaines</option>
                                                                        <option value="Vierges_Britanniques">Vierges_Britanniques</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wake">Wake</option>
                                                                        <option value="Wallis et Futuma">Wallis et Futuma</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Yougoslavie">Yougoslavie</option>
                                                                        <option value="Zambie">Zambie</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="date_debut_modify_Formation{{$loop->iteration}}">Date de début</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="date" id="date_debut_modify_Formation{{$loop->iteration}}" name="date_Debut_Formation" value="{{$formation->debutFormation}}" min="1985-01-01">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="date_fin_modify_Formation{{$loop->iteration}}">Date de fin (à préciser si la formation est finie)</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="date" id="date_fin_modify_Formation{{$loop->iteration}}" name="date_Fin_Formation" min="1985-01-01" value="{{$formation->finFormation}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modify a Formation-->

                                    <!--Delete a Formation-->
                                    <div class="modal" id="modal-default-delete-Formation{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer la formation ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href="{{Route('DeleteCandidateFormation',['id' => $formation->id_Formation])}}">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA FORMATION</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Delete a Formation-->
                            @endforeach

                            <!-- ending informations about formation-->
                        </div>
                    </div>

                    <!--Add Formation Form-->
                    <div class="modal" id="modal-default-add-Formation" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter une formation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateFormation')}}">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidateFormation->first('intitule_Formation'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateFormation->first('intitule_Formation')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateFormation->first('etablissement_Formation'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateFormation->first('etablissement_Formation')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateFormation->first('date_Debut_Formation'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateFormation->first('date_Debut_Formation')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateFormation->first('date_Fin_Formation'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateFormation->first('date_Fin_Formation')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @endif
                                            <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="intitule_add_Formation">Intitulé</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="intitule_add_Formation" name="intitule_Formation" value="{{old('intitule_Formation')}}">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="etablissement-add-Formation">Établissement</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="etablissement-add-Formation" name="etablissement_Formation" value="{{old('etablissement_Formation')}}">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="diplome_add_Formation">Diplôme</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="diplome_add_Formation" name="diplome_Formation" value="{{old('diplome_Formation')}}">
                                                        <option value="AUCUN">--</option>
                                                        <option value="BAC E">BAC E</option>
                                                        <option value="BAC D">BAC D</option>
                                                        <option value="BAC C">BAC C</option>
                                                        <option value="BAC A">BAC A</option>
                                                        <option value="BTS">BTS</option>
                                                        <option value="DUT">DUT</option>
                                                        <option value="LICENCE">LICENCE</option>
                                                        <option value="MASTER">MASTER</option>
                                                        <option value="DOCTORAT">DOCTORAT</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="Lieu-add-Formation">Lieu</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="Lieu-add-Formation" name="lieu_Formation" value="{{old('lieu_Formation')}}">
                                                        <option value="AUCUN">--</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Afrique_Centrale">Afrique_Centrale</option>
                                                        <option value="Afrique_du_sud">Afrique_du_Sud</option>
                                                        <option value="Albanie">Albanie</option>
                                                        <option value="Algerie">Algerie</option>
                                                        <option value="Allemagne">Allemagne</option>
                                                        <option value="Andorre">Andorre</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Arabie_Saoudite">Arabie_Saoudite</option>
                                                        <option value="Argentine">Argentine</option>
                                                        <option value="Armenie">Armenie</option>
                                                        <option value="Australie">Australie</option>
                                                        <option value="Autriche">Autriche</option>
                                                        <option value="Azerbaidjan">Azerbaidjan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbade">Barbade</option>
                                                        <option value="Bahrein">Bahrein</option>
                                                        <option value="Belgique">Belgique</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermudes">Bermudes</option>
                                                        <option value="Bielorussie">Bielorussie</option>
                                                        <option value="Bolivie">Bolivie</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bhoutan">Bhoutan</option>
                                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine</option>
                                                        <option value="Bresil">Bresil</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgarie">Bulgarie</option>
                                                        <option value="Burkina_Faso">Burkina_Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Caiman">Caiman</option>
                                                        <option value="Cambodge">Cambodge</option>
                                                        <option value="Cameroun">Cameroun</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Canaries">Canaries</option>
                                                        <option value="Cap_vert">Cap_Vert</option>
                                                        <option value="Chili">Chili</option>
                                                        <option value="Chine">Chine</option>
                                                        <option value="Chypre">Chypre</option>
                                                        <option value="Colombie">Colombie</option>
                                                        <option value="Comores">Colombie</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo_democratique">Congo_democratique</option>
                                                        <option value="Cook">Cook</option>
                                                        <option value="Coree_du_Nord">Coree_du_Nord</option>
                                                        <option value="Coree_du_Sud">Coree_du_Sud</option>
                                                        <option value="Costa_Rica">Costa_Rica</option>
                                                        <option value="Cote d'Ivoire">Côte d'Ivoire</option>
                                                        <option value="Croatie">Croatie</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Danemark">Danemark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominique">Dominique</option>
                                                        <option value="Egypte">Egypte</option>
                                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis</option>
                                                        <option value="Equateur">Equateur</option>
                                                        <option value="Erythree">Erythree</option>
                                                        <option value="Espagne">Espagne</option>
                                                        <option value="Estonie">Estonie</option>
                                                        <option value="Etats_Unis">Etats_Unis</option>
                                                        <option value="Ethiopie">Ethiopie</option>
                                                        <option value="Falkland">Falkland</option>
                                                        <option value="Feroe">Feroe</option>
                                                        <option value="Fidji">Fidji</option>
                                                        <option value="Finlande">Finlande</option>
                                                        <option value="France">France</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambie">Gambie</option>
                                                        <option value="Georgie">Georgie</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Grece">Grece</option>
                                                        <option value="Grenade">Grenade</option>
                                                        <option value="Groenland">Groenland</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernesey">Guernesey</option>
                                                        <option value="Guinee">Guinee</option>
                                                        <option value="Guinee_Bissau">Guinee_Bissau</option>
                                                        <option value="Guinee equatoriale">Guinee_Equatoriale</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Guyane_Francaise ">Guyane_Francaise</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong_Kong">Hong_Kong</option>
                                                        <option value="Hongrie">Hongrie</option>
                                                        <option value="Inde">Inde</option>
                                                        <option value="Indonesie">Indonesie</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Irlande">Irlande</option>
                                                        <option value="Islande">Islande</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italie">italie</option>
                                                        <option value="Jamaique">Jamaique</option>
                                                        <option value="Jan Mayen">Jan Mayen</option>
                                                        <option value="Japon">Japon</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordanie">Jordanie</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kirghizstan">Kirghizistan</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Koweit">Koweit</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Lettonie">Lettonie</option>
                                                        <option value="Liban">Liban</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lituanie">Lituanie</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Lybie">Lybie</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedoine">Macedoine</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Madère">Madère</option>
                                                        <option value="Malaisie">Malaisie</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malte">Malte</option>
                                                        <option value="Man">Man</option>
                                                        <option value="Mariannes du Nord">Mariannes du Nord</option>
                                                        <option value="Maroc">Maroc</option>
                                                        <option value="Marshall">Marshall</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Maurice">Maurice</option>
                                                        <option value="Mauritanie">Mauritanie</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexique">Mexique</option>
                                                        <option value="Micronesie">Micronesie</option>
                                                        <option value="Midway">Midway</option>
                                                        <option value="Moldavie">Moldavie</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolie">Mongolie</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Namibie">Namibie</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk">Norfolk</option>
                                                        <option value="Norvege">Norvege</option>
                                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie</option>
                                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Ouganda">Ouganda</option>
                                                        <option value="Ouzbekistan">Ouzbekistan</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestine">Palestine</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Pays_Bas">Pays_Bas</option>
                                                        <option value="Perou">Perou</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pologne">Pologne</option>
                                                        <option value="Polynesie">Polynesie</option>
                                                        <option value="Porto_Rico">Porto_Rico</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republique_Dominicaine">Republique_Dominicaine</option>
                                                        <option value="Republique_Tcheque">Republique_Tcheque</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Roumanie">Roumanie</option>
                                                        <option value="Royaume_Uni">Royaume_Uni</option>
                                                        <option value="Russie">Russie</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Sahara Occidental">Sahara Occidental</option>
                                                        <option value="Sainte_Lucie">Sainte_Lucie</option>
                                                        <option value="Saint_Marin">Saint_Marin</option>
                                                        <option value="Salomon">Salomon</option>
                                                        <option value="Salvador">Salvador</option>
                                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                        <option value="Samoa_Americaine">Samoa_Americaine</option>
                                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapour">Singapour</option>
                                                        <option value="Slovaquie">Slovaquie</option>
                                                        <option value="Slovenie">Slovenie</option>
                                                        <option value="Somalie">Somalie</option>
                                                        <option value="Soudan">Soudan</option>
                                                        <option value="Sri_Lanka">Sri_Lanka</option>
                                                        <option value="Suede">Suede</option>
                                                        <option value="Suisse">Suisse</option>
                                                        <option value="Surinam">Surinam</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Syrie">Syrie</option>
                                                        <option value="Tadjikistan">Tadjikistan</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Tanzanie">Tanzanie</option>
                                                        <option value="Tchad">Tchad</option>
                                                        <option value="Thailande">Thailande</option>
                                                        <option value="Tibet">Tibet</option>
                                                        <option value="Timor_Oriental">Timor_Oriental</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago</option>
                                                        <option value="Tristan da cunha">Tristan de cuncha</option>
                                                        <option value="Tunisie">Tunisie</option>
                                                        <option value="Turkmenistan">Turmenistan</option>
                                                        <option value="Turquie">Turquie</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican">Vatican</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vierges_Americaines">Vierges_Americaines</option>
                                                        <option value="Vierges_Britanniques">Vierges_Britanniques</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Wake">Wake</option>
                                                        <option value="Wallis et Futuma">Wallis et Futuma</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Yougoslavie">Yougoslavie</option>
                                                        <option value="Zambie">Zambie</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="ml-sm-5 col-10">
                                                    <label for="date_debut_add_Formation">Date de début</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" id="date_debut_add_Formation" name="date_Debut_Formation" value="{{old('date_Debut_Formation')}}" min="1985-01-01">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_fin_add_Formation">Date de fin (à préciser si la formation est finie)</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" id="date_fin_add_Formation" name="date_Fin_Formation" value="{{old('date_Fin_Formation')}}" min="1985-01-01">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Formation Form-->
                </div>
                <!-- End Formations-->


                <!-- Competence-->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Compétences</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Competence" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneCompetence" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">N°</th>
                                        <th style="width: 30%;">Libellé</th>
                                        <th style="width: 55%;">Description</th>
                                        <th class="text-center" style="width: 10%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $competences as $competence)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$competence->libelle_Competence}}</td>
                                                <td>{{$competence->description_Competence}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-Competence{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                    <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-Competence{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @foreach( $competences as $competence)
                            <!--Modify a skill-->
                                <div class="modal" id="modal-default-modify-Competence{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Modifier la compétence</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form class="js-validation-signup" method="post" action="{{Route('ModifyCandidateCompetence',['id' => $competence->id_Competence])}}">
                                                @csrf
                                                <div class="py-3">
                                                    @if($errors->ErrorModifyCandidateCompetence->first('libelle_Competence'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyCandidateCompetence->first('libelle_Competence')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @elseif($errors->ErrorModifyCandidateCompetence->first('description_Competence'))
                                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                            <div class="flex-fill mr-3">
                                                                <p class="mb-0">{{$errors->ErrorModifyCandidateCompetence->first('description_Competence')}}</p>
                                                            </div>
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-times-circle"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="intitule_modify_Competence{{$loop->iteration}}">Libellé</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="intitule_modify_Competence{{$loop->iteration}}" name="libelle_Competence" value="{{$competence->libelle_Competence}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="ml-sm-5 col-10">
                                                            <label for="description-modify-Competence{{$loop->iteration}}">Description</label>
                                                            <div class="input-group">
                                                                <textarea  class="form-control" id="description-modify-Competence{{$loop->iteration}}" name="description_Competence">{{$competence->description_Competence}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!--End Modify a skill-->

                                <!--Delete a skill-->
                                <div class="modal" id="modal-default-delete-Competence{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-header-color">Voulez vous supprimer la compétence ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body justify-content-center row mt-3 mb-3">
                                                <a href="{{Route('DeleteCandidateCompetence',['id' =>  $competence->id_Competence])}}">
                                                    <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LA COMPÉTENCE</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--End skill a Formation-->
                        @endforeach


                            <!-- ending informations about certification-->
                        </div>
                    </div>

                    <!--Add Competence Form-->
                    <div class="modal" id="modal-default-add-Competence" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter une compétence</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateCompetence')}}">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidateCompetence->first('libelle_Competence'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCompetence->first('libelle_Competence')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateCompetence->first('description_Competence'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateCompetence->first('description_Competence')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="intitule_add_Competence">Libellé</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="intitule_add_Competence" name="libelle_Competence" value="{{old('libelle_Competence')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="etablissement-add-Competence">Description</label>
                                                <div class="input-group">
                                                    <textarea  class="form-control" id="etablissement-add-Competence" name="description_Competence">{{old('description_Competence')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Competence Form-->
                </div>
                <!-- End Competence-->

                <!-- Professionnal Experience-->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Expériences passées</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-ProfessionnalExperience" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneProfessionnalExperience" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">N°</th>
                                        <th style="width: 15%;">Poste occupé</th>
                                        <th style="width: 15%;">Nom de l'entreprise</th>
                                        <th style="width: 15%;">Type de contrat</th>
                                        <th style="width: 15%;">Lieu</th>
                                        <th style="width: 15%;">Date de début</th>
                                        <th style="width: 10%;">Date de fin</th>
                                        <th class="text-center" style="width: 10%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $experiences as $experience)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$experience->poste_Occupe_Experience}}</td>
                                            <td>{{$experience->nom_Entreprise_Experience}}</td>
                                            <td>{{$experience->type_Contrat_Experience}}</td>
                                            <td>{{$experience->lieu_Travail_Experience}}</td>
                                            <td>{{$experience->debutExperienceProfessionnelle}}</td>
                                            <td>{{$experience->finExperienceProfessionnelle}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-ProfessionnalExperience{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-ProfessionnalExperience{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach( $experiences as $experience)
                                <!--Modify a Professionnal Experience-->
                                    <div class="modal" id="modal-default-modify-ProfessionnalExperience{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier l'expérience professionelle</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" method = "post" action="{{Route('ModifyCandidateProfessionalExperience',['id' => $experience->id_Experience_Professionelle])}}">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyCandidateProfessionalExperience->first('poste_Occupe_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('poste_Occupe_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('nom_Entreprise_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('nom_Entreprise_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('description_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0"> {{$errors->ErrorModifyCandidateProfessionalExperience->first('description_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('taches_Realisees_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('taches_Realisees_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('lieu_Travail_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('lieu_Travail_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('date_Debut_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('date_Debut_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('date_Fin_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('date_Fin_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('secteur_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('secteur_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @elseif($errors->ErrorModifyCandidateProfessionalExperience->first('type_Contrat_Experience'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateProfessionalExperience->first('type_Contrat_Experience')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="poste_occupe_modify_experience{{$loop->iteration}}">Poste occupé</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="poste_occupe_modify_experience{{$loop->iteration}}" name="poste_Occupe_Experience" value="{{$experience->poste_Occupe_Experience}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="nom-entreprise-modify-experience{{$loop->iteration}}">Nom de l'entreprise</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="nom-entreprise-modify-experience{{$loop->iteration}}" name="nom_Entreprise_Experience" value="{{$experience->nom_Entreprise_Experience}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="description_modify_experience{{$loop->iteration}}">Description</label>
                                                                <div class="input-group">
                                                                    <textarea class="form-control" rows="4" cols="50" id="description_modify_experience{{$loop->iteration}}" name="description_Experience">{{$experience->description_Experience}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="taches_realisees_experience{{$loop->iteration}}">Tâches réalisées</label>
                                                                <div class="input-group">
                                                                    <textarea class="form-control" rows="4" cols="50" id="taches_realisees_experience{{$loop->iteration}}" name="taches_Realisees_Experience" >{{$experience->taches_Realisees_Experience}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="lieu-travail-modify-experience{{$loop->iteration}}">Lieu de travail</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="lieu-travail-modify-experience{{$loop->iteration}}" name="lieu_Travail_Experience">
                                                                        <option value="AUCUN">--</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Afrique_Centrale">Afrique_Centrale</option>
                                                                        <option value="Afrique_du_sud">Afrique_du_Sud</option>
                                                                        <option value="Albanie">Albanie</option>
                                                                        <option value="Algerie">Algerie</option>
                                                                        <option value="Allemagne">Allemagne</option>
                                                                        <option value="Andorre">Andorre</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Arabie_Saoudite">Arabie_Saoudite</option>
                                                                        <option value="Argentine">Argentine</option>
                                                                        <option value="Armenie">Armenie</option>
                                                                        <option value="Australie">Australie</option>
                                                                        <option value="Autriche">Autriche</option>
                                                                        <option value="Azerbaidjan">Azerbaidjan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbade">Barbade</option>
                                                                        <option value="Bahrein">Bahrein</option>
                                                                        <option value="Belgique">Belgique</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermudes">Bermudes</option>
                                                                        <option value="Bielorussie">Bielorussie</option>
                                                                        <option value="Bolivie">Bolivie</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bhoutan">Bhoutan</option>
                                                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine</option>
                                                                        <option value="Bresil">Bresil</option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgarie">Bulgarie</option>
                                                                        <option value="Burkina_Faso">Burkina_Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Caiman">Caiman</option>
                                                                        <option value="Cambodge">Cambodge</option>
                                                                        <option value="Cameroun">Cameroun</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Canaries">Canaries</option>
                                                                        <option value="Cap_vert">Cap_Vert</option>
                                                                        <option value="Chili">Chili</option>
                                                                        <option value="Chine">Chine</option>
                                                                        <option value="Chypre">Chypre</option>
                                                                        <option value="Colombie">Colombie</option>
                                                                        <option value="Comores">Colombie</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Congo_democratique">Congo_democratique</option>
                                                                        <option value="Cook">Cook</option>
                                                                        <option value="Coree_du_Nord">Coree_du_Nord</option>
                                                                        <option value="Coree_du_Sud">Coree_du_Sud</option>
                                                                        <option value="Costa_Rica">Costa_Rica</option>
                                                                        <option value="Cote d'Ivoire">Côte d'Ivoire</option>
                                                                        <option value="Croatie">Croatie</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Danemark">Danemark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominique">Dominique</option>
                                                                        <option value="Egypte">Egypte</option>
                                                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis</option>
                                                                        <option value="Equateur">Equateur</option>
                                                                        <option value="Erythree">Erythree</option>
                                                                        <option value="Espagne">Espagne</option>
                                                                        <option value="Estonie">Estonie</option>
                                                                        <option value="Etats_Unis">Etats_Unis</option>
                                                                        <option value="Ethiopie">Ethiopie</option>
                                                                        <option value="Falkland">Falkland</option>
                                                                        <option value="Feroe">Feroe</option>
                                                                        <option value="Fidji">Fidji</option>
                                                                        <option value="Finlande">Finlande</option>
                                                                        <option value="France">France</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambie">Gambie</option>
                                                                        <option value="Georgie">Georgie</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Grece">Grece</option>
                                                                        <option value="Grenade">Grenade</option>
                                                                        <option value="Groenland">Groenland</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guernesey">Guernesey</option>
                                                                        <option value="Guinee">Guinee</option>
                                                                        <option value="Guinee_Bissau">Guinee_Bissau</option>
                                                                        <option value="Guinee equatoriale">Guinee_Equatoriale</option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Guyane_Francaise ">Guyane_Francaise</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Hawaii">Hawaii</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong_Kong">Hong_Kong</option>
                                                                        <option value="Hongrie">Hongrie</option>
                                                                        <option value="Inde">Inde</option>
                                                                        <option value="Indonesie">Indonesie</option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Irlande">Irlande</option>
                                                                        <option value="Islande">Islande</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italie">italie</option>
                                                                        <option value="Jamaique">Jamaique</option>
                                                                        <option value="Jan Mayen">Jan Mayen</option>
                                                                        <option value="Japon">Japon</option>
                                                                        <option value="Jersey">Jersey</option>
                                                                        <option value="Jordanie">Jordanie</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kirghizstan">Kirghizistan</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="Koweit">Koweit</option>
                                                                        <option value="Laos">Laos</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Lettonie">Lettonie</option>
                                                                        <option value="Liban">Liban</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                                        <option value="Lituanie">Lituanie</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Lybie">Lybie</option>
                                                                        <option value="Macao">Macao</option>
                                                                        <option value="Macedoine">Macedoine</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Madère">Madère</option>
                                                                        <option value="Malaisie">Malaisie</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malte">Malte</option>
                                                                        <option value="Man">Man</option>
                                                                        <option value="Mariannes du Nord">Mariannes du Nord</option>
                                                                        <option value="Maroc">Maroc</option>
                                                                        <option value="Marshall">Marshall</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Maurice">Maurice</option>
                                                                        <option value="Mauritanie">Mauritanie</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexique">Mexique</option>
                                                                        <option value="Micronesie">Micronesie</option>
                                                                        <option value="Midway">Midway</option>
                                                                        <option value="Moldavie">Moldavie</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolie">Mongolie</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Namibie">Namibie</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk">Norfolk</option>
                                                                        <option value="Norvege">Norvege</option>
                                                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie</option>
                                                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Ouganda">Ouganda</option>
                                                                        <option value="Ouzbekistan">Ouzbekistan</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestine">Palestine</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee</option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Pays_Bas">Pays_Bas</option>
                                                                        <option value="Perou">Perou</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pologne">Pologne</option>
                                                                        <option value="Polynesie">Polynesie</option>
                                                                        <option value="Porto_Rico">Porto_Rico</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Republique_Dominicaine">Republique_Dominicaine</option>
                                                                        <option value="Republique_Tcheque">Republique_Tcheque</option>
                                                                        <option value="Reunion">Reunion</option>
                                                                        <option value="Roumanie">Roumanie</option>
                                                                        <option value="Royaume_Uni">Royaume_Uni</option>
                                                                        <option value="Russie">Russie</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Sahara Occidental">Sahara Occidental</option>
                                                                        <option value="Sainte_Lucie">Sainte_Lucie</option>
                                                                        <option value="Saint_Marin">Saint_Marin</option>
                                                                        <option value="Salomon">Salomon</option>
                                                                        <option value="Salvador">Salvador</option>
                                                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                                        <option value="Samoa_Americaine">Samoa_Americaine</option>
                                                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapour">Singapour</option>
                                                                        <option value="Slovaquie">Slovaquie</option>
                                                                        <option value="Slovenie">Slovenie</option>
                                                                        <option value="Somalie">Somalie</option>
                                                                        <option value="Soudan">Soudan</option>
                                                                        <option value="Sri_Lanka">Sri_Lanka</option>
                                                                        <option value="Suede">Suede</option>
                                                                        <option value="Suisse">Suisse</option>
                                                                        <option value="Surinam">Surinam</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Syrie">Syrie</option>
                                                                        <option value="Tadjikistan">Tadjikistan</option>
                                                                        <option value="Taiwan">Taiwan</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Tanzanie">Tanzanie</option>
                                                                        <option value="Tchad">Tchad</option>
                                                                        <option value="Thailande">Thailande</option>
                                                                        <option value="Tibet">Tibet</option>
                                                                        <option value="Timor_Oriental">Timor_Oriental</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago</option>
                                                                        <option value="Tristan da cunha">Tristan de cuncha</option>
                                                                        <option value="Tunisie">Tunisie</option>
                                                                        <option value="Turkmenistan">Turmenistan</option>
                                                                        <option value="Turquie">Turquie</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican">Vatican</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vierges_Americaines">Vierges_Americaines</option>
                                                                        <option value="Vierges_Britanniques">Vierges_Britanniques</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Wake">Wake</option>
                                                                        <option value="Wallis et Futuma">Wallis et Futuma</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Yougoslavie">Yougoslavie</option>
                                                                        <option value="Zambie">Zambie</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="secteur-modify-experience{{$loop->iteration}}">Secteur d'activité</label>
                                                                <div class="input-group">
                                                                    <select type="text" class="form-control" id="secteur-modify-experience{{$loop->iteration}}" name="secteur_Experience">
                                                                            <option value="AUCUN">--</option>
                                                                            <option value ="Activités associatives">Activités associatives</option>
                                                                            <option value ="Administration publique">Administration publique</option>
                                                                            <option value ="Aéronautique navale">Aéronautique navale</option>
                                                                            <option value ="Agriculture">Agriculture</option>
                                                                            <option value ="pêche">pêche</option>
                                                                            <option value ="aquaculture">aquaculture</option>
                                                                            <option value ="">Agroalimentaire</option>
                                                                            <option value ="Ameublement">Ameublement</option>
                                                                            <option value ="décoration">décoration</option>
                                                                            <option value ="Automobile">Automobile</option>
                                                                            <option value ="matériels de transport">matériels de transport</option>
                                                                            <option value ="réparation">réparation</option>
                                                                            <option value ="Banque">Banque</option>
                                                                            <option value ="assurance">assurance</option>
                                                                            <option value ="finances">finances</option>
                                                                            <option value ="BTP">BTP</option>
                                                                            <option value ="construction">construction</option>
                                                                            <option value ="Centres d´appel">Centres d´appel</option>
                                                                            <option value ="hotline">hotline</option>
                                                                            <option value ="call center">call center</option>
                                                                            <option value ="Chimie">Chimie</option>
                                                                            <option value ="pétrochimie">pétrochimie</option>
                                                                            <option value ="matières premières">matières premières</option>
                                                                            <option value ="">Conseil</option>
                                                                            <option value ="audit">audit</option>
                                                                            <option value ="comptabilité">comptabilité</option>
                                                                            <option value ="Distribution">Distribution</option>
                                                                            <option value ="vente">vente</option>
                                                                            <option value ="commerce de gros ">commerce de gros </option>
                                                                            <option value ="Édition">Édition</option>
                                                                            <option value ="imprimerie">imprimerie</option>
                                                                            <option value ="Éducation">Éducation</option>
                                                                            <option value ="formation">formation</option>
                                                                            <option value ="">Electricité</option>
                                                                            <option value ="eau">eau</option>
                                                                            <option value ="gaz">gaz</option>
                                                                            <option value ="nucléaire">nucléaire</option>
                                                                            <option value ="énergie">énergie</option>
                                                                            <option value ="Environnement">Environnement</option>
                                                                            <option value ="recyclage">recyclage</option>
                                                                            <option value =">Equip. électriques">Equip. électriques</option>
                                                                            <option value ="électronique">électronique</option>
                                                                            <option value ="optiques">optiques</option>
                                                                            <option value ="Equipements mécaniques">Equipements mécaniques</option>
                                                                            <option value ="machines">machines</option>
                                                                            <option value ="Espaces verts">Espaces verts</option>
                                                                            <option value ="forêts">forêts</option>
                                                                            <option value ="chasse">chasse</option>
                                                                            <option value ="Évènementiel">Évènementiel</option>
                                                                            <option value ="accueil">accueil</option>
                                                                            <option value ="hôte(sse)">hôte(sse)</option>
                                                                            <option value ="restauration">restauration</option>
                                                                            <option value ="Hôtellerie">Hôtellerie</option>
                                                                            <option value ="Immobilier">Immobilier</option>
                                                                            <option value ="architecture">architecture</option>
                                                                            <option value ="urbanisme">urbanisme</option>
                                                                            <option value ="Import export">Import export</option>
                                                                            <option value ="Industrie pharmaceutique">Industrie pharmaceutique</option>
                                                                            <option value ="Industrie">Industrie</option>
                                                                            <option value ="Informatique">Informatique</option>
                                                                            <option value ="SSII">SSII</option>
                                                                            <option value ="Internet">Internet</option>
                                                                            <option value ="études développement">études développement</option>
                                                                            <option value ="Ingénierie">Ingénierie</option>
                                                                            <option value ="Intérim">Intérim</option>
                                                                            <option value ="recrutement">recrutement</option>
                                                                            <option value ="Luxe">Luxe</option>
                                                                            <option value ="Cosmétiques">Cosmétiques</option>
                                                                            <option value ="Maintenance">Maintenance</option>
                                                                            <option value ="entretien "></option>
                                                                            <option value ="service après vente">service après vente</option>
                                                                            <option value ="">Manutention</option>
                                                                            <option value ="Marketing">Marketing</option>
                                                                            <option value ="communication">communication</option>
                                                                            <option value ="médias">médias</option>
                                                                            <option value ="sidérurgie">sidérurgie</option>
                                                                            <option value ="Métallurgie">Métallurgie</option>
                                                                            <option value ="Nettoyage">Nettoyage</option>
                                                                            <option value =" sécurité">sécurité</option>
                                                                            <option value ="surveillance">surveillance</option>
                                                                            <option value ="Papier">Papier</option>
                                                                            <option value ="Produits de grande consommation">Produits de grande consommation</option>
                                                                            <option value ="Qualité">Qualité</option>
                                                                            <option value ="Recherche et développement">Recherche et développement</option>
                                                                            <option value ="Santé">Santé</option>
                                                                            <option value ="pharmacie">pharmacie</option>
                                                                            <option value ="hôpitaux">hôpitaux</option>
                                                                            <option value ="équipements médicaux">équipements médicaux</option>
                                                                            <option value ="Secrétariat">Secrétariat</option>
                                                                            <option value ="Services autres">Services autres</option>
                                                                            <option value ="Services collectifs et sociaux">Services collectifs et sociaux</option>
                                                                            <option value ="services à la personne">services à la personne</option>
                                                                            <option value ="Sport">Sport</option>
                                                                            <option value ="action culturelle et sociale">action culturelle et sociale</option>
                                                                            <option value ="Télécom">Télécom</option>
                                                                            <option value ="Textile">Textile</option>
                                                                            <option value ="habillement">habillement</option>
                                                                            <option value ="cuir">cuir</option>
                                                                            <option value ="chaussures">chaussures</option>
                                                                            <option value ="Tourisme">Tourisme</option>
                                                                            <option value ="loisirs">loisirs</option>
                                                                            <option value ="Transports">Transports</option>
                                                                            <option value ="logistique">logistique</option>
                                                                            <option value ="services postaux">services postaux</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="type-contrat-modify-experience{{$loop->iteration}}">Type de contrat</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="type-contrat-modify-experience{{$loop->iteration}}" name="type_Contrat_Experience">$experience->type_Contrat_Experience
                                                                        <option value="CDD" @if(isset($experience->type_Contrat_Experience)) @if($experience->type_Contrat_Experience == "CDD")selected @endif @endif>CDD</option>
                                                                        <option value="CDI" @if(isset($experience->type_Contrat_Experience)) @if($experience->type_Contrat_Experience == "CDI")selected @endif @endif>CDI</option>
                                                                        <option value="STAGE SCOLAIRE" @if(isset($experience->type_Contrat_Experience)) @if($experience->type_Contrat_Experience == "STAGE SCOLAIRE")selected @endif @endif>STAGE</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="date_debut_modify_experience{{$loop->iteration}}">Date de début</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="date" id="date_debut_modify_experience{{$loop->iteration}}" name="date_Debut_Experience" value="{{$experience->debutExperienceProfessionnelle}}" min="1985-01-01">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="date_fin_modify_experience{{$loop->iteration}}">Date de fin (à préciser si vous n'êtes plus en poste)</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="date" id="date_fin_modify_experience{{$loop->iteration}}" name="date_Fin_Experience" value="{{$experience->finExperienceProfessionnelle}}" min="1985-01-01">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modify a Professionnal Experience-->

                                    <!--Delete a Professionnal Experience-->
                                    <div class="modal" id="modal-default-delete-ProfessionnalExperience{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer l'expérience professionnelle ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href="{{Route('DeleteCandidateProfessionalExperience',['id' => $experience->id_Experience_Professionelle])}}">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER L'EXPERIENCE PROFESSIONNELLE</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End Delete a Professionnal Experience-->

                                    <!-- ending informations about Professionnal Experience-->
                            @endforeach
                        </div>
                    </div>

                    <!--Add Professionnal Experience Form-->
                    <div class="modal" id="modal-default-add-ProfessionnalExperience" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter une expérience professionnelle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateProfessionalExperience')}}">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidateProfessionalExperience->first('poste_Occupe_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('poste_Occupe_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('nom_Entreprise_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('nom_Entreprise_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('description_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('description_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('taches_Realisees_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('taches_Realisees_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('lieu_Travail_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('lieu_Travail_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('date_Debut_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('date_Debut_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('date_Fin_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('date_Fin_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('secteur_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('secteur_Experience')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @elseif($errors->ErrorRegistrerCandidateProfessionalExperience->first('type_Contrat_Experience'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0"></p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle">{{$errors->ErrorRegistrerCandidateProfessionalExperience->first('type_Contrat_Experience')}}</i>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="poste_occupe_add_experience">Poste occupé</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="poste_occupe_add_experience" name="poste_Occupe_Experience" value="{{old('poste_Occupe_Experience')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="nom-entreprise-add-experience">Nom de l'entreprise</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nom-entreprise-add-experience" name="nom_Entreprise_Experience" value="{{old('nom_Entreprise_Experience')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="description_add_experience">Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="4" cols="50" id="description_add_experience" name="description_Experience">{{old('description_Experience')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="taches_realisees_add_experience">Tâches réalisées</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="4" cols="50" id="taches_realisees_add_experience" name="taches_Realisees_Experience">{{old('taches_Realisees_Experience')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="lieu-travail-modify-experience1">Lieu de travail</label>
                                                <div class="input-group">

                                                    <select class="form-control" id="lieu-travail-add-experience" name="lieu_Travail_Experience">
                                                        <option value="AUCUN">--</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Afrique_Centrale">Afrique_Centrale</option>
                                                        <option value="Afrique_du_sud">Afrique_du_Sud</option>
                                                        <option value="Albanie">Albanie</option>
                                                        <option value="Algerie">Algerie</option>
                                                        <option value="Allemagne">Allemagne</option>
                                                        <option value="Andorre">Andorre</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Arabie_Saoudite">Arabie_Saoudite</option>
                                                        <option value="Argentine">Argentine</option>
                                                        <option value="Armenie">Armenie</option>
                                                        <option value="Australie">Australie</option>
                                                        <option value="Autriche">Autriche</option>
                                                        <option value="Azerbaidjan">Azerbaidjan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbade">Barbade</option>
                                                        <option value="Bahrein">Bahrein</option>
                                                        <option value="Belgique">Belgique</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermudes">Bermudes</option>
                                                        <option value="Bielorussie">Bielorussie</option>
                                                        <option value="Bolivie">Bolivie</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bhoutan">Bhoutan</option>
                                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine</option>
                                                        <option value="Bresil">Bresil</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgarie">Bulgarie</option>
                                                        <option value="Burkina_Faso">Burkina_Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Caiman">Caiman</option>
                                                        <option value="Cambodge">Cambodge</option>
                                                        <option value="Cameroun">Cameroun</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Canaries">Canaries</option>
                                                        <option value="Cap_vert">Cap_Vert</option>
                                                        <option value="Chili">Chili</option>
                                                        <option value="Chine">Chine</option>
                                                        <option value="Chypre">Chypre</option>
                                                        <option value="Colombie">Colombie</option>
                                                        <option value="Comores">Colombie</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo_democratique">Congo_democratique</option>
                                                        <option value="Cook">Cook</option>
                                                        <option value="Coree_du_Nord">Coree_du_Nord</option>
                                                        <option value="Coree_du_Sud">Coree_du_Sud</option>
                                                        <option value="Costa_Rica">Costa_Rica</option>
                                                        <option value="Cote d'Ivoire">Côte d'Ivoire</option>
                                                        <option value="Croatie">Croatie</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Danemark">Danemark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominique">Dominique</option>
                                                        <option value="Egypte">Egypte</option>
                                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis</option>
                                                        <option value="Equateur">Equateur</option>
                                                        <option value="Erythree">Erythree</option>
                                                        <option value="Espagne">Espagne</option>
                                                        <option value="Estonie">Estonie</option>
                                                        <option value="Etats_Unis">Etats_Unis</option>
                                                        <option value="Ethiopie">Ethiopie</option>
                                                        <option value="Falkland">Falkland</option>
                                                        <option value="Feroe">Feroe</option>
                                                        <option value="Fidji">Fidji</option>
                                                        <option value="Finlande">Finlande</option>
                                                        <option value="France">France</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambie">Gambie</option>
                                                        <option value="Georgie">Georgie</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Grece">Grece</option>
                                                        <option value="Grenade">Grenade</option>
                                                        <option value="Groenland">Groenland</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernesey">Guernesey</option>
                                                        <option value="Guinee">Guinee</option>
                                                        <option value="Guinee_Bissau">Guinee_Bissau</option>
                                                        <option value="Guinee equatoriale">Guinee_Equatoriale</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Guyane_Francaise ">Guyane_Francaise</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong_Kong">Hong_Kong</option>
                                                        <option value="Hongrie">Hongrie</option>
                                                        <option value="Inde">Inde</option>
                                                        <option value="Indonesie">Indonesie</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Irlande">Irlande</option>
                                                        <option value="Islande">Islande</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italie">italie</option>
                                                        <option value="Jamaique">Jamaique</option>
                                                        <option value="Jan Mayen">Jan Mayen</option>
                                                        <option value="Japon">Japon</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordanie">Jordanie</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kirghizstan">Kirghizistan</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Koweit">Koweit</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Lettonie">Lettonie</option>
                                                        <option value="Liban">Liban</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lituanie">Lituanie</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Lybie">Lybie</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedoine">Macedoine</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Madère">Madère</option>
                                                        <option value="Malaisie">Malaisie</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malte">Malte</option>
                                                        <option value="Man">Man</option>
                                                        <option value="Mariannes du Nord">Mariannes du Nord</option>
                                                        <option value="Maroc">Maroc</option>
                                                        <option value="Marshall">Marshall</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Maurice">Maurice</option>
                                                        <option value="Mauritanie">Mauritanie</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexique">Mexique</option>
                                                        <option value="Micronesie">Micronesie</option>
                                                        <option value="Midway">Midway</option>
                                                        <option value="Moldavie">Moldavie</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolie">Mongolie</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Namibie">Namibie</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk">Norfolk</option>
                                                        <option value="Norvege">Norvege</option>
                                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie</option>
                                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Ouganda">Ouganda</option>
                                                        <option value="Ouzbekistan">Ouzbekistan</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestine">Palestine</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Pays_Bas">Pays_Bas</option>
                                                        <option value="Perou">Perou</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pologne">Pologne</option>
                                                        <option value="Polynesie">Polynesie</option>
                                                        <option value="Porto_Rico">Porto_Rico</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republique_Dominicaine">Republique_Dominicaine</option>
                                                        <option value="Republique_Tcheque">Republique_Tcheque</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Roumanie">Roumanie</option>
                                                        <option value="Royaume_Uni">Royaume_Uni</option>
                                                        <option value="Russie">Russie</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Sahara Occidental">Sahara Occidental</option>
                                                        <option value="Sainte_Lucie">Sainte_Lucie</option>
                                                        <option value="Saint_Marin">Saint_Marin</option>
                                                        <option value="Salomon">Salomon</option>
                                                        <option value="Salvador">Salvador</option>
                                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                        <option value="Samoa_Americaine">Samoa_Americaine</option>
                                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapour">Singapour</option>
                                                        <option value="Slovaquie">Slovaquie</option>
                                                        <option value="Slovenie">Slovenie</option>
                                                        <option value="Somalie">Somalie</option>
                                                        <option value="Soudan">Soudan</option>
                                                        <option value="Sri_Lanka">Sri_Lanka</option>
                                                        <option value="Suede">Suede</option>
                                                        <option value="Suisse">Suisse</option>
                                                        <option value="Surinam">Surinam</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Syrie">Syrie</option>
                                                        <option value="Tadjikistan">Tadjikistan</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Tanzanie">Tanzanie</option>
                                                        <option value="Tchad">Tchad</option>
                                                        <option value="Thailande">Thailande</option>
                                                        <option value="Tibet">Tibet</option>
                                                        <option value="Timor_Oriental">Timor_Oriental</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago</option>
                                                        <option value="Tristan da cunha">Tristan de cuncha</option>
                                                        <option value="Tunisie">Tunisie</option>
                                                        <option value="Turkmenistan">Turmenistan</option>
                                                        <option value="Turquie">Turquie</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican">Vatican</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vierges_Americaines">Vierges_Americaines</option>
                                                        <option value="Vierges_Britanniques">Vierges_Britanniques</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Wake">Wake</option>
                                                        <option value="Wallis et Futuma">Wallis et Futuma</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Yougoslavie">Yougoslavie</option>
                                                        <option value="Zambie">Zambie</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="secteur-add-experience">Secteur d'activité</label>
                                                <div class="input-group">
                                                    <select type="text" class="form-control" id="secteur-add-experience" name="secteur_Experience">
                                                        <option value="AUCUN">--</option>
                                                        <option value ="Activités associatives">Activités associatives</option>
                                                        <option value ="Administration publique">Administration publique</option>
                                                        <option value ="Aéronautique navale">Aéronautique navale</option>
                                                        <option value ="Agriculture">Agriculture</option>
                                                        <option value ="pêche">pêche</option>
                                                        <option value ="aquaculture">aquaculture</option>
                                                        <option value ="">Agroalimentaire</option>
                                                        <option value ="Ameublement">Ameublement</option>
                                                        <option value ="décoration">décoration</option>
                                                        <option value ="Automobile">Automobile</option>
                                                        <option value ="matériels de transport">matériels de transport</option>
                                                        <option value ="réparation">réparation</option>
                                                        <option value ="Banque">Banque</option>
                                                        <option value ="assurance">assurance</option>
                                                        <option value ="finances">finances</option>
                                                        <option value ="BTP">BTP</option>
                                                        <option value ="construction">construction</option>
                                                        <option value ="Centres d´appel">Centres d´appel</option>
                                                        <option value ="hotline">hotline</option>
                                                        <option value ="call center">call center</option>
                                                        <option value ="Chimie">Chimie</option>
                                                        <option value ="pétrochimie">pétrochimie</option>
                                                        <option value ="matières premières">matières premières</option>
                                                        <option value ="">Conseil</option>
                                                        <option value ="audit">audit</option>
                                                        <option value ="comptabilité">comptabilité</option>
                                                        <option value ="Distribution">Distribution</option>
                                                        <option value ="vente">vente</option>
                                                        <option value ="commerce de gros ">commerce de gros </option>
                                                        <option value ="Édition">Édition</option>
                                                        <option value ="imprimerie">imprimerie</option>
                                                        <option value ="Éducation">Éducation</option>
                                                        <option value ="formation">formation</option>
                                                        <option value ="">Electricité</option>
                                                        <option value ="eau">eau</option>
                                                        <option value ="gaz">gaz</option>
                                                        <option value ="nucléaire">nucléaire</option>
                                                        <option value ="énergie">énergie</option>
                                                        <option value ="Environnement">Environnement</option>
                                                        <option value ="recyclage">recyclage</option>
                                                        <option value =">Equip. électriques">Equip. électriques</option>
                                                        <option value ="électronique">électronique</option>
                                                        <option value ="optiques">optiques</option>
                                                        <option value ="Equipements mécaniques">Equipements mécaniques</option>
                                                        <option value ="machines">machines</option>
                                                        <option value ="Espaces verts">Espaces verts</option>
                                                        <option value ="forêts">forêts</option>
                                                        <option value ="chasse">chasse</option>
                                                        <option value ="Évènementiel">Évènementiel</option>
                                                        <option value ="accueil">accueil</option>
                                                        <option value ="hôte(sse)">hôte(sse)</option>
                                                        <option value ="restauration">restauration</option>
                                                        <option value ="Hôtellerie">Hôtellerie</option>
                                                        <option value ="Immobilier">Immobilier</option>
                                                        <option value ="architecture">architecture</option>
                                                        <option value ="urbanisme">urbanisme</option>
                                                        <option value ="Import export">Import export</option>
                                                        <option value ="Industrie pharmaceutique">Industrie pharmaceutique</option>
                                                        <option value ="Industrie">Industrie</option>
                                                        <option value ="Informatique">Informatique</option>
                                                        <option value ="SSII">SSII</option>
                                                        <option value ="Internet">Internet</option>
                                                        <option value ="études développement">études développement</option>
                                                        <option value ="Ingénierie">Ingénierie</option>
                                                        <option value ="Intérim">Intérim</option>
                                                        <option value ="recrutement">recrutement</option>
                                                        <option value ="Luxe">Luxe</option>
                                                        <option value ="Cosmétiques">Cosmétiques</option>
                                                        <option value ="Maintenance">Maintenance</option>
                                                        <option value ="entretien "></option>
                                                        <option value ="service après vente">service après vente</option>
                                                        <option value ="">Manutention</option>
                                                        <option value ="Marketing">Marketing</option>
                                                        <option value ="communication">communication</option>
                                                        <option value ="médias">médias</option>
                                                        <option value ="sidérurgie">sidérurgie</option>
                                                        <option value ="Métallurgie">Métallurgie</option>
                                                        <option value ="Nettoyage">Nettoyage</option>
                                                        <option value =" sécurité">sécurité</option>
                                                        <option value ="surveillance">surveillance</option>
                                                        <option value ="Papier">Papier</option>
                                                        <option value ="Produits de grande consommation">Produits de grande consommation</option>
                                                        <option value ="Qualité">Qualité</option>
                                                        <option value ="Recherche et développement">Recherche et développement</option>
                                                        <option value ="Santé">Santé</option>
                                                        <option value ="pharmacie">pharmacie</option>
                                                        <option value ="hôpitaux">hôpitaux</option>
                                                        <option value ="équipements médicaux">équipements médicaux</option>
                                                        <option value ="Secrétariat">Secrétariat</option>
                                                        <option value ="Services autres">Services autres</option>
                                                        <option value ="Services collectifs et sociaux">Services collectifs et sociaux</option>
                                                        <option value ="services à la personne">services à la personne</option>
                                                        <option value ="Sport">Sport</option>
                                                        <option value ="action culturelle et sociale">action culturelle et sociale</option>
                                                        <option value ="Télécom">Télécom</option>
                                                        <option value ="Textile">Textile</option>
                                                        <option value ="habillement">habillement</option>
                                                        <option value ="cuir">cuir</option>
                                                        <option value ="chaussures">chaussures</option>
                                                        <option value ="Tourisme">Tourisme</option>
                                                        <option value ="loisirs">loisirs</option>
                                                        <option value ="Transports">Transports</option>
                                                        <option value ="logistique">logistique</option>
                                                        <option value ="services postaux">services postaux</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="type-contrat-add-experience">Type de contrat</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="type-contrat-add-experience" name="type_Contrat_Experience">
                                                        <option value="AUCUN">--</option>
                                                        <option value="CDD">CDD</option>
                                                        <option value="CDI">CDI</option>
                                                        <option value="STAGE">STAGE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_debut_add_experience">Date de début</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" id="date_debut_add_experience" name="date_Debut_Experience" value="{{old('date_Debut_Experience')}}" min="1985-01-01">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="date_fin_add_experience">Date de fin (à préciser si vous n'êtes plus en poste)</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="date" id="date_fin_add_experience" name="date_Fin_Experience" value="{{old('date_Fin_Experience')}}" min="1985-01-01">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Professionnal Experience Form-->
                </div>
                <!-- End Professionnal Experience-->

                <!-- Documents -->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Documents</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Document" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneDocument" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">N°</th>
                                        <th class="text-center" style="width: 80%;">Type de document</th>
                                        <th class="text-center" style="width: 15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $documents as $document)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">{{$document->type_Document}}</td>
                                            <td class="text-center">
                                                <a href="{{Route('DownloadCandidateDocument',['id'  => $document->id_Document])}}"><button type="button" class="btn btn-sm btn-rounded btn-hero-warning"><i class="fa fa-download"> </i></button></a>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-Document{{$loop->iteration}}"><i class="fa fa-pen"> </i></button>
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-Document{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach( $documents as $document)
                                <!--Delete a Document-->
                                    <div class="modal" id="modal-default-delete-Document{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Voulez vous supprimer le document ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body justify-content-center row mt-3 mb-3">
                                                    <a href="{{Route('DeleteCandidateDocument',['id' => $document->id_Document])}}">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger">SUPPRIMER LE DOCUMENT</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--End delete Document-->
                                    <!--Modify Document-->
                                    <div class="modal" id="modal-default-modify-Document{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title modal-header-color">Modifier le document</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <form class="js-validation-signup" method="post" action="{{Route('ModifyCandidateDocument',['id' => $document->id_Document])}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="py-3">
                                                        @if($errors->ErrorModifyCandidateDocument->first('lien_Document'))
                                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                                <div class="flex-fill mr-3">
                                                                    <p class="mb-0">{{$errors->ErrorModifyCandidateDocument->first('lien_Document')}}</p>
                                                                </div>
                                                                <div class="flex-00-auto">
                                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="type_modify_Document{{$loop->iteration}}">Type de document</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="type_modify_Document{{$loop->iteration}}" name="type_Document">
                                                                        <option value="CV" @if(isset($document->type_Document)) @if($document->type_Document == "CV") selected @endif @endif>CV</option>
                                                                        <option value="LETTRE DE MOTIVATION"  @if(isset($document->type_Document)) @if($document->type_Document == "LETTRE DE MOTIVATION") selected @endif @endif>LETTRE DE MOTIVATION</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="ml-sm-5 col-10">
                                                                <label for="lien_modify_document{{$loop->iteration}}">Sélectionner le document</label>
                                                                <div class="input-group">
                                                                    <input type="file"  id="lien_modify_document{{$loop->iteration}}" name="lien_Document">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div><!--End Modify Document-->
                                    <!--End modify Document-->
                            @endforeach
                            <!-- ending informations about Document-->
                        </div>
                    </div>
                    <div class="modal" id="modal-default-add-Document" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter un document</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" method="post" action="{{Route('RegisterCandidateDocument')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="py-3">
                                        @if($errors->ErrorRegistrerCandidateDocument->first('lien_Document'))
                                            <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                                <div class="flex-fill mr-3">
                                                    <p class="mb-0">{{$errors->ErrorRegistrerCandidateDocument->first('lien_Document')}}</p>
                                                </div>
                                                <div class="flex-00-auto">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="type_add_Document">Type de document</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="type_add_Document" name="type_Document">
                                                        <option value="AUCUN">--</option>
                                                        <option value="CV">CV</option>
                                                        <option value="LETTRE DE MOTIVATION">LETTRE DE MOTIVATION</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="lien_add_document">Sélectionner le document</label>
                                                <div class="input-group">
                                                    <input type="file" id="lien_add_document" name="lien_Document">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Language Form-->
                </div>
                <!-- End Documents -->


                <!-- Langues -->
                <div class="block block-rounded">
                    <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link button-left" href="#">Langues</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link button-right" data-toggle="modal" data-target="#modal-default-add-Langue" href="#"><i class="fa fa-plus-square"> </i> Ajouter </a>
                        </li>
                    </ul>
                    <div class="block-content-new borderColor tab-content">
                        <div class="tab-pane active" id="tab_paneLangue" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">N°</th>
                                        <th style="width: 30%;">Référence</th>
                                        <th style="width: 30%;">Niveau</th>
                                        <th style="width: 25%;">Visible pour le recruteur</th>
                                        <th class="text-center" style="width: 10%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($parles as $parle)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$parle->langues->reference_Langue}}</td>
                                            <td>{{$parle->niveau_Langue}}</td>
                                            <td>@if($parle->statut_Langue) OUI @else NON @endif</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-rounded btn-hero-warning" data-toggle="modal" data-target="#modal-default-delete-Langue{{$loop->iteration}}"><i class="fa fa-times-circle"> </i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach($parles as $parle)
                            <!--Delete a language-->
                            <div class="modal" id="modal-default-delete-Langue{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title modal-header-color">Voulez vous supprimer la langue ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body justify-content-center row mt-3 mb-3">
                                            <a href="{{Route('DeleteCandidateLangue',['id' => $parle->id_Parle])}}">
                                                <button type="button" class="btn btn-hero-lg btn-hero-danger" >SUPPRIMER LA LANGUE</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End delete Language-->
                            @endforeach
                            <!-- ending informations about certification-->
                        </div>
                    </div>

                    <!--Add Language Form-->
                    <div class="modal" id="modal-default-add-Langue" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-header-color">Ajouter une langue</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <form class="js-validation-signup" action="{{Route('RegisterCandidateLangue')}}" method = "post">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="langue_Selectionnee">Réference</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="langue_Selectionnee" name="langue_Selectionnee">
                                                        @foreach($langues as $langue)
                                                            <option value="{{$langue->reference_Langue}}">{{$langue->reference_Langue}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <label for="etablissement-add-Competence">Niveau</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="niveau_langue" name="niveau_Langue">
                                                        <option value="DÉBUTANT">DÉBUTANT</option>
                                                        <option value="INTERMÉDIAIRE">INTERMÉDIAIRE</option>
                                                        <option value="AVANCÉ">AVANCÉ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ml-sm-5 col-10">
                                                <div class="input-group">
                                                    <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                                        <input type="checkbox" class="custom-control-input" id="statut_langue" name="statut_Langue" value="Oui">
                                                        <label class="custom-control-label" for="statut_langue">Visible pour le recruteur ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "AJOUTER">
                                        <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Add Language Form-->
                </div>
                <!-- End Langues -->
            </div>
            <!-- END Page Content -->
        </main>
@endsection