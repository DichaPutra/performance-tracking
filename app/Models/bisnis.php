<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bisnis extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $table = 'bisnis';
    protected $fillable = [
        'id_bisnis_categories', 'bisnis'
    ];

}
