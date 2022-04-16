@extends('layouts.Admin.base_Authentication')

@section('Page_Title')
    ConnexionAdmin
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
                        <h1 class="mb-3 text-center">Connexion Administrateur</h1>

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

                            <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                                <form  method = "post" class="js-validation-signup" action="{{Route('login_Admin')}}" >
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <div class="col-8 col-sm-8 ml-2">
                                                <label for="e-mail">E-mail</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control form-control-sm"  id = "e_mail_admin" name = "E_mail_admin" placeholder = "Entrez votre e-mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-8 col-sm-8 ml-2">
                                                <label for="mot_de_passe">Mot de passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-sm"  id = "mot_de_passe_admin" name = "Mot_de_passe_admin" placeholder = "Entrez votre mot de passe">
                                                </div>
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
