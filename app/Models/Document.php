<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_Document',                                    //Candidate's Document Type
        'lien_Document',                                    //Candidate's Document path
        'candidat_id'                                       //Owner's candidate id
    ];
    protected $primaryKey = 'id_Document';
    protected $table = 'Documents';



}
