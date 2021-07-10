<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class active_target_kpi extends Model {

    use HasFactory;

    protected $table = 'active_target_kpi';
    protected $fillable = [
        'id_user', 'bulan', 'tahun','so', 'kpi', 'unit', 'measurement', 'target', 'weight', 'polarization', 'timeframe_target'
    ];

}
