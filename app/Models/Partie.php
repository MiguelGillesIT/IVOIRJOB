<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_Partie',                                           //Part Title
        'description_Partie',                                       //Part Description
        'quiz_id',                                                  //Correspunding quiz for the part

    ];
    protected $primaryKey = 'id_Partie';
    protected $table = 'Parties';

    //Retrieve the questions
    public function  questions(){
        return $this->hasMany(Question::class,'partie_id');
    }

    //Retrieve the questions
    public function  quiz(){
        return $this->belongsTo(Quiz::class,'quiz_id');
    }

    public function partieScore(){

    }
}
