<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBProject extends Model
{
    protected $table = 'main_inf'; 

    protected $fillable = [
        'text_info',
        'file_info',
        'list_info',
        'url_info',
    ];
}