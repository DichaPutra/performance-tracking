<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class target_so extends Model {

    use HasFactory;

    protected $table = 'target_so';
    protected $fillable = [
        'id_user', 'id_so', 'so'
    ];

}
