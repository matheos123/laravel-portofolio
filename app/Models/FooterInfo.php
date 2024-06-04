<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'info',
        'copy',
        'powered_by'
    ];
}
