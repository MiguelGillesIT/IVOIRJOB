@extends('layouts.Candidat.base')

@section('Page_Title')
    Offres
@endsection

@section('css_file')
    {{asset('assets/css/main_page_offres.min.css')}}
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
        <div  class="content">
            @if(session('ErreurSoumission'))
                <div class="row justify-content-center">
                    <div class="row justify-content-center alert alert-danger align-items-center ml-5 col-6 d-flex form-group text-align-center" role="alert">
                        <div class="flex-fill mr-3">
                            <p class="mb-0">{{session('ErreurSoumission')}}</p>
                        </div>
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </div>
                    </div>
                </div>
            @endif
            <form class="w-100" action="{{Route("ShowOffersPageRetrieve")}}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                        <select class="form-control" id="example-select" name="type_offre">
                            <option value="AUCUN">Type d'offre</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="STAGE">STAGE</option>
                        </select>
                    </div>
                    <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                        <input type="date" class="form-control" placeholder="date_limite" name="date_limite_de_soumission" min="now">
                    </div>
                    <div class="col-10 col-md-3 col-xl-3 col-sm-3 col-lg-3 mt-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="example-group2-input2" placeholder="Rechercher une offre" name="recherche_offre">
                        </div>
                    </div>
                    <div class="col-3 col-md-1 col-xl-1 col-sm-1 col-lg-1 mt-2">
                        <div class="input-group">
                            <button type="submit" class="btn btn-hero-success"><span><i class="fa fa-search mr-1"></i></span></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row justify-content-center mt-4 mb-4">
                @foreach($formatFiches as $fiches)
                        <div class="col-md-5">
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <div class="row justify-content-center">
                                        <h3 class="font-w700 text-center">{{$fiches->libelle_Fiche}}</h3>
                                        <a class="nav-link button-right lienSoumission" href="{{Route('SoummissionOffre',['idFiche' => $fiches->id_Fiche])}}"><i class="fa fa-2x fa-plus-square"> </i></a>
                                    </div>
                                    <h5 class="font-w700 text-center">Type de contrat : {{$fiches->type_Offre}} </h5>
                                    <h5 class="font-w700 text-center">Date limite de soumission : {{$fiches->format_limite_date}} </h5>
                                    <p class="font-w600 text-justify">{{$fiches->description_Fiche}}</p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        <!-- END Page Content -->
    </main>

@endsection