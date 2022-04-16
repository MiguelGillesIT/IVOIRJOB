@extends('layouts.Candidat.base_Authentication')

@section('Page_Title')
    Connexion
@endsection

@section('css_file')
    {{asset('assets/css/connexion.min.css')}}
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
                        <h1 class="mb-3 text-center">Connexion</h1>

                        {{--Connexion Error--}}
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                @if ($loop->first)
                                    <div class="mb-3 text-center row justify-content-center text-center">
                                        <div class="alert alert-danger  col-10 col-sm-8 col-md-6 col-lg-5 d-flex align-items-center " role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0">{{$error}}</p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        {{--End connexion Error--}}

                        <div class="row no-gutters justify-content-center">

                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                                <form  method = "post" class="js-validation-signup" action="{{Route('login_Candiat')}}" >
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <div class="col-8 col-sm-8 ml-md-3">
                                                <label for="e-mail">E-mail</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control form-control-sm" id = "e-mail_candidat" name = "E_mail" placeholder = "Entrez votre e-mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-sm-8 ml-md-3">
                                                <label for="mot_de_passe">Mot de passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-sm"  id = "password_candidat" name = "Mot_de_passe" placeholder = "Entrez votre mot de passe">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center text-center">
                                            <div class="askform">
                                                Avez-vous un compte?
                                            </div>
                                        </div>
                                        <div class="row justify-content-center text-center">
                                            <div>
                                                <a href="{{Route('Show_inscription_candiat')}}">Inscrivez-vous</a>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 col-md-5 mr-auto block-content">
                                            <input type="submit" class="btn btn-block btn-hero-danger btn-hero-success" value = "CONNEXION">
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