<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',                           //User Action
        'userIpAddress',                    //User IP Address
        'userMacAddress',                   //User Mac Address
        'user_id',                          //User ID
        'groupe_id',                        //Group ID
    ];

    protected $primaryKey = 'id_Log';
    protected $table = 'logs';
}
