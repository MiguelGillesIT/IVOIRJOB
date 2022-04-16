<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule_Etape'
    ];
    protected $primaryKey = 'id_Etape';
    protected $table = 'Etapes';
}
