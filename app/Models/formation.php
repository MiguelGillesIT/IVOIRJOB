<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule_Formation',                               //Candidate's Formation entitled
        'etablissement_Formation',                          //Candidate's Formation School
        'diplome_Formation',                                //Candidate's Formation Degree
        'lieu_Formation',                                   //Candidate's Formation Location
        'date_Debut_Formation',                             //Candidate's Formation begining date
        'date_Fin_Formation',                               //Candidate's Formation endind date
        'candidat_id'                                       //Owner's candidate id
    ];
    protected $primaryKey = 'id_Formation';
    protected $table = 'formations';

    public function getDebutFormationAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Debut_Formation),0,10);
    }

    public function getFinFormationAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Fin_Formation),0,10);
    }
}
