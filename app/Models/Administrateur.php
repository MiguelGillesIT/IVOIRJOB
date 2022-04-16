<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Administrateur  extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable;
    protected $fillable = [
            'nom_Administrateur',                           //Admin's name
            'prenoms_Administrateur',                       //Admin's others names
            'e_mail_Administrateur',                        //Admin's e-mail
            'service_Administrateur',                       //Admin's service in ELITE CI
            'statut_Administrateur',                        //Admin's account status
            'date_Verrouillage_Administrateur',             //Admin's account locking day
            'date_Deverrouillage_Administrateur',           //Admin's account unlocking day
            'groupe_id',                                    //Admin's Groupe
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'id_Administrateur';
    protected $table = 'administrateurs';

    public function  groupe(){
        return $this->belongsTo(Group::class,'groupe_id');
    }
}
