<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proposition extends Model
{
    use HasFactory;
    protected $fillable = [
        'reponse',                                                      //Question's possible answer
        'statut_Solution',                                              //answer status
        'photo_Proposition',                                             //Proposition Picture
        'question_id',                                                  //Correspunding question id
    ];

    protected $primaryKey = 'id_Proposition';
    protected $table = 'Propositions';

    public function getCheminPhotoPropositionAttribute(){
        return 'storage/'.Str::after($this->photo_Proposition, 'public/');
    }

}
