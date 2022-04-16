<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_Competence',                         //Candidate's skills entitled
        'description_Competence',                     //Candidate skills description
        'candidat_id'                                 //Owner's candidate id
    ];
    protected $primaryKey = 'id_Competence';
    protected $table = 'Competences';
}
