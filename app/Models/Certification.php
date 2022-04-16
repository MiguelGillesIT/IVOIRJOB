<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule_Certification',                     //Candidate's certification entitled
        'organisation_Certification',                 //Candidate certificiation Organizations
        'date_Debut_Certification',                   //Candidate certificiation begining date
        'date_Fin_Certification',                     //Candidate certificiation ending date
        'candidat_id'                                 //Owner's candidate id
    ];
    protected $primaryKey = 'id_Certification';
    protected $table = 'Certifications';

    public function getDebutCertificationAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Debut_Certification),0,10);
    }

    public function getFinCertificationAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Fin_Certification),0,10);
    }
}
