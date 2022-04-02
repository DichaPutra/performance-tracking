<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capaian_kpi_file extends Model {

    use HasFactory;
    protected $table = 'capaian_kpi_file';
    protected $fillable = [
        'id_user', 'bulan', 'tahun', 'filename', 'path'
    ];

}
