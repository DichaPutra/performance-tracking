<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kpi_library extends Model {

    use HasFactory;

    protected $table = 'kpi_library';
    protected $fillable = [
        'id_so', 'kpi'
    ];

}
