<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class target_status extends Model {

    use HasFactory;

    protected $table = 'target_status';
    protected $fillable = [
        'id_user', 'periode_th', 'status', 'reason'
    ];
    // status = waiting for approval, not approved, approved, active
}
