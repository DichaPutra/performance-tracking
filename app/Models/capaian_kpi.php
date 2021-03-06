<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capaian_kpi extends Model {

    use HasFactory;

    protected $table = 'capaian_kpi';
    protected $fillable = [
        'id_user','id_active_target_kpi', 'bulan', 'tahun', 'so', 'kpi', 'unit', 'measurement', 'target', 'weight', 'polarization', 'timeframe_target','capaian', 'score'
    ];

}
