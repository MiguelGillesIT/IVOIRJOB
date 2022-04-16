<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_Participation_Etape',                              //Operation date's
        'Score_Etape',                                           //Score for current step
        'validation_Etape',                                      //Validation status
        'lien_Etape',                                            //link for step
        'etape_id',                                              //step's id
        'soumission_id',                                         //Soumission's id

    ];
    protected $primaryKey = 'id_Suivi';
    protected $table = 'Suivis';


    public function  soumissions(){
        return $this->belongsTo(Soumission::class,'soumission_id');
    }

    public function  etape(){
        return $this->belongsTo(Etape::class,'etape_id');
    }



}
