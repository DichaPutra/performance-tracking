<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actionplan extends Model {

    use HasFactory;

    protected $table = 'actionplan';
    protected $fillable = [
        'id_user', 'id_target_si', 'si', 'periode_th'
    ];

}
