<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ExperienceProfessionnelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'poste_Occupe_Experience',                   //Candidate's professionnal Experience job
        'nom_Entreprise_Experience',                 //Candidate's professionnal Experience entreprise name
        'description_Experience',                    //Candidate's professionnal Experience description
        'taches_Realisees_Experience',               //Candidate's professionnal Experience tasks
        'lieu_Travail_Experience',                   //Candidate's professionnal Experience location
        'date_Debut_Experience',                     //Candidate's professionnal Experience begining date
        'date_Fin_Experience',                       //Candidate's professionnal Experience ending date
        'secteur_Experience',                        //Candidate's professionnal Experience domain of activity
        'type_Contrat_Experience',                   //Candidate's professionnal Experience type of contract
        'candidat_id'                                //Owner's candidate id
    ];
    protected $primaryKey = 'id_Experience_Professionelle';
    protected $table = 'experiencesprofessionelles';

    public function getDebutExperienceProfessionnelleAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Debut_Experience),0,10);
    }

    public function getFinExperienceProfessionnelleAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Fin_Experience),0,10);
    }

    public function experienceDuration(){
        $experienceEnd = (int)Str::substr(Carbon::createFromFormat('Y-m-d H:i:s', $this->date_Fin_Experience)->format('d-m-Y'), 6,4);
        $experienceBegin  = (int)Str::substr(Carbon::createFromFormat('Y-m-d H:i:s', $this->date_Debut_Experience)->format('d-m-Y'), 6,4);;
        $duration  = $experienceEnd - $experienceBegin;
        return $duration ;
    }
}
