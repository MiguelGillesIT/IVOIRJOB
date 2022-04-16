@extends('layouts.Candidat.base')

@section('Page_Title')
    Paramètres
@endsection

@section('css_file')
        {{asset('assets/css/main_page_candidate_settings.min.css')}}
@endsection

@section('Content')
        <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div>
                    <div class="content content-full">
                    </div>
                </div>
                <!-- END Hero -->
                @if(session('ErreurMotdePasse'))
                    <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                        <div class="flex-fill mr-3">
                            <p class="mb-0">{{session('ErreurMotdePasse')}}</p>
                        </div>
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </div>
                    </div>
                @endif

                <!-- Page Content -->
                <div class="content">
                    <div class="row justify-content-center text-center">
                        @if(session('SuccesMotdePasse'))
                            <div class="alert alert-success align-items-center ml-5 col-10 col-sm-8 col-md-6 col-lg-5  d-flex form-group text-align-center" role="alert">
                                <div class="flex-fill mr-3">
                                    <p class="mb-0">{{session('SuccesMotdePasse')}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row justify-content-center text-center">
                        <div class="col-6 col-sm-4 col-md-3 mt-2 mb-2">
                            <button type="button" class="btn btn-hero-warning" data-toggle="modal" data-target="#modal-default-modify-password">
                                <span class="d-none d-inline-block">Changer votre mot de passe</span>
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 mt-2 mb-2">
                            <button type="button" class="btn btn-hero-warning">
                                <span class="d-none d-inline-block">Modifier l'éclairage</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal" id="modal-default-modify-password" tabindex="-1" aria-labelledby="modal-default-vcenter" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal-header-color">Modifier votre mot de passe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="js-validation-signup" method="post" action="{{Route('ModifyPasswordCandidate')}}">
                                @csrf
                                <div class="py-3">
                                    @if($errors->ModifyPasswordCandidate->first('Old_password'))
                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0">{{$errors->ModifyPasswordCandidate->first('Old_password')}}</p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    @elseif($errors->ModifyPasswordCandidate->first('New_password'))
                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0">{{$errors->ErrorRegistrerCandidateCertification->first('New_password')}}</p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    @elseif($errors->ModifyPasswordCandidate->first('Confirm_new_password'))
                                        <div class="alert alert-danger align-items-center ml-5 col-10 d-flex form-group text-align-center" role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0">{{$errors->ModifyPasswordCandidate->first('Confirm_new_password')}}</p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="ml-sm-5 col-10">
                                            <label for="old_password">Ancien mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="old_password" name="Old_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="ml-sm-5 col-10">
                                            <label for="new_password">Nouveau mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="new_password" name="New_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="ml-sm-5 col-10">
                                            <label for="confirm_new_password">Confirmer le nouveau mot de passe</label>
                                            <div class="input-group">
                                                <input class="form-control" type="password" id="confirm_new_password" name="Confirm_new_password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <input type="submit" class="btn btn-hero-lg btn-hero-warning" value = "MODIFIER">
                                    <button type="button" class="btn btn-hero-lg btn-hero-danger" data-dismiss="modal">ANNULER</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
        <!-- END Main Container -->
@endsection