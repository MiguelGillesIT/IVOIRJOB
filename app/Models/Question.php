<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_Question',                                                //Question's type
        'libelle_Question',                                             //Question formulation
        'photo_Question',                                               //Question picture
        'duree_Question',                                               //Question duration
        'point_Question',                                               //Question mark
        'partie_id',                                                    //Correspunding part for the question

    ];
    protected $primaryKey = 'id_Question';
    protected $table = 'Questions';

    public function propositions(){
        return $this->hasMany(Proposition::class,'question_id');
    }

    public function parties(){
        return $this->belongsTo(Partie::class,'partie_id');
    }
    public function getCheminPhotoQuestionAttribute(){
       return 'storage/'.Str::after($this->photo_Question, 'public/');
    }
}
