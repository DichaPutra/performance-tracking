<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class so_library extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $table = 'so_library';
    protected $fillable = [
        'id_business_categories', 'so', 'bisnis', 'aspect'
    ];

}
