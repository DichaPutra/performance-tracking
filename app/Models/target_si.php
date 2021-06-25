<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class target_si extends Model {

    use HasFactory;

    protected $table = 'target_si';
    protected $fillable = [
        'id_user', 'id_target_kpi', 'id_si_library', 'si'
    ];

}
