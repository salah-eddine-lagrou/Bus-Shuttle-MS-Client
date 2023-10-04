<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compte extends Model
{
    use HasFactory;

    protected $table = 'comptes';

    protected $fillable = [
        'id_client',
        'montant',
        'code'
    ];

    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
