<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FichePoste extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_Fiche',                                    //Title of job offer
        'description_Fiche',                                //Description of Job Offer
        'type_Offre',                                       //Type of job offer
        'date_Limite_Candidature',                          //Limite date for offer
        'administrateur_id',                                //Admin's who have created him id

    ];

    protected $primaryKey = 'id_Fiche';
    protected $table = 'fiche_postes';

    public function getLimiteDateAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Limite_Candidature),0,10);
    }


    public function getFormatLimiteDateAttribute(){
        $date = Str::substr(Str::replace('/','-',$this->date_Limite_Candidature),0,10);
        $year = Str::substr($date,0,4);
        $month = Str::substr($date,5,2);
        $day = Str::substr($date,8,2);
        return $day.'/'.$month.'/'.$year;
    }

    public function criteres(){
        return $this->hasMany(Critere::class, 'fiche_id');
    }


    public function isOffre($Offre){
        return $this->type_Offre === $Offre;
    }

    public function Soumissions(){
        return $this->hasMany(Soumission::class, 'fiche_id');
    }

    public function Quiz(){
        return $this->hasOne(Quiz::class, 'fiche_id');
    }

    public function SuivisQuiz(){
        return $this->hasManyThrough(Suivi::class,Soumission::class,'fiche_id','soumission_id','id_Fiche','id_Soumission')->where('validation_Etape','=','1')->where('etape_id','=','2')->orderBy('Score_Etape','desc');
    }

    public function SuivisEntretien(){
        return $this->hasManyThrough(Suivi::class,Soumission::class,'fiche_id','soumission_id','id_Fiche','id_Soumission')->where('validation_Etape','=','1')->where('etape_id','=','3')->orderBy('Score_Etape','desc');
    }
}
