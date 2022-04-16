<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parle extends Model
{
    use HasFactory;
    protected $fillable = [
        'niveau_Langue',                         //Candidate's skills entitled
        'statut_Langue',                         //Candidate's skills entitled
        'langue_id',                             //Candidate skills description
        'candidat_id'                            //Candidate Speaker
    ];
    protected $primaryKey = 'id_Parle';
    protected $table = 'Parles';

    //Retrieve the candidate language spoken
    public function  langues(){
        return $this->belongsTo(Langue::class,'langue_id');
    }

}
