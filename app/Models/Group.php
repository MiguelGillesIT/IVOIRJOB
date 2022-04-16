<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fonctionnalite;

class Group extends Model
{
    use HasFactory;
    protected $fillable =[
        'libelle_Groupe',
    ];

    protected $primaryKey = 'id_Groupe';
    protected $table = 'Groupes';

    public function acces(){
        return $this->hasMany(Acces::class,'groupe_id');
    }

    public function admins(){
        return $this->hasMany(Administrateur::class,'groupe_id');
    }

    public function fonctionnalites(){
        return $this->belongsToMany(Fonctionnalite::class,'Acces','groupe_id','fonctionnalite_id');

    }
}
