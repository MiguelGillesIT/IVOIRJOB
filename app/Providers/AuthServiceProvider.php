<?php

namespace App\Providers;

use App\Models\Administrateur;
use App\Models\Candidat;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate to verify that Admin can see Job offers pages
        Gate::define('ActOnFichePoste', function (Administrateur $admin) {

            return ($admin->groupe->acces->where('fonctionnalite_id','1')->first() != null) && (!$admin->statut_Administrateur) ;
        });

        //Gate to verify that Admin can see users profil and act on them
        Gate::define('ActOnProfilUsers', function (Administrateur $admin) {

            return ($admin->groupe->acces->where('fonctionnalite_id','2')->first() != null) && (!$admin->statut_Administrateur) ;
        });

        //Gate to verify that Admin can see quiz page act do CRUD on it
        Gate::define('ActOnQuiz', function (Administrateur $admin) {
            return ($admin->groupe->acces->where('fonctionnalite_id','3')->first() != null) && (!$admin->statut_Administrateur) ;
        });

        //Gate to verify that Admin can see
        Gate::define('ActOnScheduleEntretien', function (Administrateur $admin) {
            return ($admin->groupe->acces->where('fonctionnalite_id','4')->first() != null) && (!$admin->statut_Administrateur);
        });

        //Gate to verify that Admin can see validation page and act on it
        Gate::define('ActOnValidation', function (Administrateur $admin) {
            return ($admin->groupe->acces->where('fonctionnalite_id','5')->first() != null) && (!$admin->statut_Administrateur);
        });

        //Gate to verify that Admin can see and act on settings
        Gate::define('ActOnSecurite', function (Administrateur $admin) {
            return ($admin->groupe->acces->where('fonctionnalite_id','6')->first() != null) && (!$admin->statut_Administrateur) ;
        });

        //Gate to verify that Admin can see and act on settings
        Gate::define('ActOnLogs', function (Administrateur $admin) {
            return ($admin->groupe->acces->where('fonctionnalite_id','11')->first() != null) && (!$admin->statut_Administrateur) ;
        });

        //Gate to verify that candidate can see his dashboard
        Gate::define('ActOnDashboard', function (Candidat $candidate) {
            return ($candidate->groupe->acces->where('fonctionnalite_id','7')->first() != null) && (!$candidate->statut_Administrateur);
        });

        //Gate to verify that candidate can see his settings and modify them
        Gate::define('ActOnSettings', function (Candidat $candidate) {
            return ($candidate->groupe->acces->where('fonctionnalite_id','10')->first() != null) && (!$candidate->statut_Administrateur);
        });

        //Gate to verify that candidate can see his profile and modify it
        Gate::define('ActOnProfile', function (Candidat $candidate) {
            return ($candidate->groupe->acces->where('fonctionnalite_id','9')->first() != null) && (!$candidate->statut_Administrateur);
        });

        //Gate to verify that candidate can see and submit on
        Gate::define('ActOnJobOffers', function (Candidat $candidate) {
            return ($candidate->groupe->acces->where('fonctionnalite_id','8')->first() != null) && (!$candidate->statut_Administrateur);
        });



    }
}
