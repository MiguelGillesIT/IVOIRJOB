<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_Langue'
    ];
    protected $primaryKey = 'id_Langue';
    protected $table = 'Langues';
}
