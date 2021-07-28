<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bisnis extends Model {

    use HasFactory;

    protected $table = 'bisnis';
    protected $fillable = [
        'bisnis'
    ];

}
