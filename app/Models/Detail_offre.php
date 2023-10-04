<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_offre extends Model
{
    use HasFactory;

    protected $table = 'detail_offre';

    protected $fillable = [
        'id',
        'id_offre'
      

    ];
}
