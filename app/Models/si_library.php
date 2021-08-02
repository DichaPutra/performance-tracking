<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class si_library extends Model {

    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'si_library';
    protected $fillable = [
        'id_kpi_library', 'si'
    ];

}
