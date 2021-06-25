<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class target_kpi extends Model {

    use HasFactory;

    protected $table = 'target_kpi';
    protected $fillable = [
        'id_user', 'id_target_so', 'id_kpi_library', 'kpi', 'unit', 'measurement', 'target', 'weight', 'polarization'
    ];

}
