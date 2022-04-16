@extends('layouts.Admin.base')

@section('Page_Title')
    Accès
@endsection
@section('css_file')
    {{asset('assets/css/main_page_admin_acces.min.css')}}
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
            @foreach($groupes as $key=>$groupe)
                <h4>{{$groupe->libelle_Groupe}}</h4>
                <form class="js-validation-signup" method = "post" action = "{{Route('RegisterAccessGroup', ['idGroup' => $groupe->id_Groupe])}}">
                    @csrf
                    <div class="py-3">
                        <div class="form-group row justify-content-center">
                        @foreach($fonctionnalites as $fonctionnalite)
                                <div class="ml-sm-2 col-2">
                                    <div class="input-group">
                                        <div class="custom-checkbox custom-control custom-control-inline custom-control-lg">
                                            <input class="custom-control-input" type="checkbox" id="{{Str::lower($fonctionnalite->libelle)}}{{$loop->parent->iteration}}" @if(in_array($fonctionnalite->libelle,$fonctionnalites_Groupes[$key]))checked @endif  name="{{$fonctionnalite->libelle}}" value="{{$fonctionnalite->libelle}}">
                                            <label class="custom-control-label" for = "{{Str::lower($fonctionnalite->libelle)}}{{$loop->parent->iteration}}">{{$fonctionnalite->libelle}}</label>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-hero-lg btn-hero-success" value = "METTRE A JOUR">
                    </div>
                </form>

            @endforeach


        </div>
        <!-- END Page Content -->
    </main>
@endsection