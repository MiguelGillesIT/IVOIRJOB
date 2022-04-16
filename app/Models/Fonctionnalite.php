<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fonctionnalite extends Model
{
    use HasFactory;
    protected $fillable = [
                    'libelle_Fonctionnalite'         //Feature title
    ];

    protected $primaryKey = 'id_Fonctionnalite';
    protected $table = 'Fonctionnalites';

    public function getlibelleAttribute(){
        return Str::replace(' ','_',$this->libelle_Fonctionnalite);

    }

    public function acces(){
        return $this->hasMany(Acces::class,'fonctionnalite_id');
    }



}
