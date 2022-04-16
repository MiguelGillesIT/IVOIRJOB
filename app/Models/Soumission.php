<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soumission extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_Soumission',                              //Operation date's
        'candidat_id',                                 //Correspunding Candidate
        'fiche_id',                                    //Correspunding job offer for the quiz

    ];
    protected $primaryKey = 'id_Soumission';
    protected $table = 'Soumissions';

    //Retrieve the candidates
    public function  candidats(){
       return $this->belongsTo(Candidat::class,'candidat_id');
    }

    //Retrieve the jobs offers
    public function  Offres(){
        return $this->belongsTo(FichePoste::class,'fiche_id');
    }

    public function suivis(){
        return $this->hasOne(Suivi::class, 'soumission_id');
    }

    public function latestSuivis()
    {
        return $this->hasOne(Suivi::class,'soumission_id')->latest();
    }

    public function SuiviEntretien(){
        return $this->hasMany(Suivi::class, 'soumission_id')->where('etape_id','=','3');
    }

    public function SuiviValidation(){
        return $this->hasOne(Suivi::class, 'soumission_id')->where('etape_id','=','4');
    }

}
