<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Candidat extends Authenticatable implements MustVerifyEmail
{
    use HasFactory ,Notifiable;
    protected $fillable = [
        'nom_Candidat',                         //Candidate's name
        'prenoms_Candidat',                     //Candidate's Prenames
        'e_mail_Candidat',                      //Candidate's e-mail
        'password',                //Candidate's Password
        'statut_Candidat',                      //Candidate's status for locking or unlocking his account
        'date_Verrouillage_Candidat',           //Candidate's account's locking date
        'date_Deverrouillage_Candidat',         //Candidate's account's unlocking date
        'date_Naissance_Candidat',              //Candidate's BirthDate
        'nationalite_Candidat',                 //Candidate's nationality
        'sexe_Candidat',                        //Candidate's gender
        'photo_Candidat',                       //Candidate's profile Photo
        'telephone_Candidat',                   //Candidate's cellphone number
        'situation_Matrimoniale_Candidat',      //Candidate's marital status
        'permis_Candidat',                      //Candidate's driver license
        'lieu_Residence_Candidat',              //Candidate's Place of residence
        'numero_Piece_Candidat',                //Candidate's identity Card number
        'groupe_id',                            //Candidate's group

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'statut_Candidat' => false,
    ];


    protected $primaryKey = 'id_Candidat';

    protected $table = 'candidats';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Retrieve the candidate formations
     public function  formations(){
        return $this->hasMany(formation::class,'candidat_id');
    }

    //Retrieve the candidate documents
    public function  documents(){
        return $this->hasMany(Document::class,'candidat_id');
    }

    //Retrieve the candidate professional Experiences
    public function  experiences(){
        return $this->hasMany(ExperienceProfessionnelle::class,'candidat_id');
    }

    //Retrieve the candidate Certifications
    public function  certifications(){
        return $this->hasMany(Certification::class,'candidat_id');
    }

    //Retrieve the candidate skills
    public function  competences(){
        return $this->hasMany(Competence::class,'candidat_id');
    }

    //Retrieve the candidate parle
    public function  parles(){
        return $this->hasMany(Parle::class,'candidat_id');
    }

    //Retrieve the candidate job offers
    public function  Soumissions(){
        return $this->hasMany(Soumission::class,'candidat_id');
    }

    public function  groupe(){
        return $this->belongsTo(Group::class,'groupe_id');
    }


    //Retrieve the candidate current age
    public function  getAgeAttribute(){
        if($this->date_Naissance_Candidat != null){
            return (int)Str::substr(today().'',0,4) - (int)Str::substr($this->date_Naissance_Candidat.'',0,4);
        }else{
            return 0;
        }
    }

    //Retrieve the candidate birthday With correct format
    public function  getBirthDayAttribute(){
        return Str::substr($this->date_Naissance_Candidat.'',0,10);
    }


    //Retrieve the candidate photo
    public function  getPhotoAttribute(){
        return 'storage/'.Str::after($this->photo_Candidat, 'public/');
    }

    //verify if candidate Can See Dashboard
    public function seeDashBoard(){

    }

}
