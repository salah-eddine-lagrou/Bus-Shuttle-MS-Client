<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{

    protected $table = 'verification';

    protected $fillable = [
        'code',
        'id_client'
    ];

    use HasFactory;
}
