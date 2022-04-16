<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acces extends Model
{
    use HasFactory;
    protected $fillable = [
        'fonctionnalite_id',                              //Corresponding feature
        'groupe_id',                                      //correspunding group

    ];
    protected $primaryKey = 'id_Acces';
    protected $table = 'Acces';

    public function fonctionnalites(){
        return $this->belongsTo(Fonctionnalite::class,'fonctionnalite_id');
    }

    public function groupes(){
        return $this->belongsTo(Group::class,'groupe_id');
    }

    public function fonctionnalite(){
        return $this->hasOne(Fonctionnalite::class,'id_Fonctionnalite',"fonctionnalite_id");
    }
}
