<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule_Quiz',                               //Quiz Title
        'date_Limite_Quiz',                            //LimiteDateQuiz
        'fiche_id',                                    //Correspunding job offer for the quiz
        'score_Minimal_Quiz',                          //Minimum Quiz's score to pass Quiz step
    ];
    protected $primaryKey = 'id_Quiz';
    protected $table = 'Quiz';

//    public function ScoreTotal(){
//        $this->hasManyThrough(Question::class,Partie::class, 'quiz_id','partie_id','id_Quiz','id_Partie')->
//    }
    public function getDateQuizAttribute(){
        return Str::substr(Str::replace('/','-',$this->date_Limite_Quiz),0,10);

    }

    //Retrieve the quiz parts
    public function  parties(){
        return $this->hasMany(Partie::class,'quiz_id');
    }

    public function fichePoste(){
        return $this->belongsTo(FichePoste::class,'fiche_id');
    }

    public function isGreatherThan($Score){
        return  $Score > (int)$this->score_Minimal_Quiz;
    }

}
