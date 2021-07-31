<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_categories extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $table = 'business_categories';
    protected $fillable = [
        'category'
    ];

}
