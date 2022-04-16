<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critere extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_Critere',                                    //Title of critera
        'statut_Critere',                                     //critera's status to know if it is an obligation or not
        'valeur_Critere',                                     //critera's value
        'type_Critere',                                       //Critera's type
        'fiche_id',                                           //correspunding job offer

    ];

    protected $primaryKey = 'id_Critere';
    protected $table = 'Criteres';
}
