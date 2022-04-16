@extends('layouts.Candidat.base_Authentication')

@section('Page_Title')
    Inscription
@endsection

@section('css_file')
    {{asset('assets/css/inscription.min.css')}}
@endsection

@section('content_Authentication')

    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image">
            <div class="row no-gutters justify-content-center bg-black-75">
                <!-- Main Section -->
                <div class="hero-static col-md-12 d-flex align-items-center bg-white">
                    <div class="p-4 w-100">
                        <!-- Header -->
                        <div class="mb-3 text-center">
                            <a class=" font-w700 font-size-h1" href="{{Route('page_Acceuil')}}">
                                <img class="imgHeader" src="{{asset('assets/media/photos/IVOIRJOB.png')}}" alt="logoIVOIRJOB">
                            </a>
                        </div>
                        <!-- END Header -->

                        {{--Error Inscription--}}
                        <h1 class="mb-3 text-center">Inscription</h1>
                        @if($errors->ErrorInscriptionCandidate->first('Nom'))
                                    <div class="mb-3 text-center row justify-content-center text-center">
                                        <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('Nom')}}</p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                        @elseif($errors->ErrorInscriptionCandidate->first('Prenoms'))
                            <div class="mb-3 text-center row justify-content-center text-center">
                                <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                    <div class="flex-fill mr-3">
                                        <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('Prenoms')}}</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        @elseif($errors->ErrorInscriptionCandidate->first('E-mail'))
                            <div class="mb-3 text-center row justify-content-center text-center">
                                <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                    <div class="flex-fill mr-3">
                                        <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('E-mail')}}</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        @elseif($errors->ErrorInscriptionCandidate->first('Telephone'))
                            <div class="mb-3 text-center row justify-content-center text-center">
                                <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                    <div class="flex-fill mr-3">
                                        <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('Telephone')}}</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        @elseif($errors->ErrorInscriptionCandidate->first('Mot_de_passe'))
                            <div class="mb-3 text-center row justify-content-center text-center">
                                <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                    <div class="flex-fill mr-3">
                                        <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('Mot_de_passe')}}</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        @elseif($errors->ErrorInscriptionCandidate->first('Confirmation_de_mot_de_passe'))
                            <div class="mb-3 text-center row justify-content-center text-center">
                                <div class="alert alert-danger  col-10 col-lg-4 d-flex align-items-center " role="alert">
                                    <div class="flex-fill mr-3">
                                        <p class="mb-0">{{$errors->ErrorInscriptionCandidate->first('Confirmation_de_mot_de_passe')}}</p>
                                    </div>
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{--End error Inscription--}}

                        <div class="row no-gutters justify-content-center">

                            <div class="col-sm-9 col-12 col-md-7 col-lg-4">

                                <form class="js-validation-signup" method="post" action="{{Route('Inscription_Candiat')}}" >
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="nom">Nom</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id = "nom_candidat" name = "Nom" value = "{{old('Nom')}}" placeholder = "Entrez votre nom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="prenoms">Prénoms</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id = "prenoms_candidat" name = "Prenoms" value = "{{old('Prenoms')}}" placeholder = "Entrez vos prénoms">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="e-mail">E-mail</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control form-control-sm" id = "e-mail_candidat" name = "E-mail" value = "{{old('E-mail')}}" placeholder = "Entrez votre e-mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="telephone">Téléphone</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id = "telephone_candidat" name = "Telephone" value = "{{old('Telephone')}}" placeholder = "Entrez votre numero de telephone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="mot_de_passe">Mot de passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-sm" id = "password_candidat" name = "Mot_de_passe" placeholder = "Entrez votre mot de passe">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-md-9">
                                                <label for="Confirmation_mot_de_passe">Confirmation de mot de passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-sm" id = "confirmat_Password_candidat" name = "Confirmation_de_mot_de_passe" placeholder = "Confirmez votre mot de passe">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="askform col-6 col-sm-5 col-md-3 col-lg-3">
                                                Déjà inscrit?
                                            </div>
                                            <div class="col-4 col-sm-6 col-md-5 col-lg-4">
                                                <a href="{{Route('Show_connexion_candiat')}}">Connectez-vous</a>
                                            </div>
                                        </div>
                                        <div class="form-group col-5 col-sm-5 col-md-5 col-lg-6 block-content">
                                            <input type="submit" class="btn btn-block btn-hero-danger btn-hero-success" value = "INSCRIPTION">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign Up Form -->
                    </div>
                </div>
                <!-- END Main Section -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection

