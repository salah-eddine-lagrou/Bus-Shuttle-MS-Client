<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notesCommentaire extends Model
{
    use HasFactory;

    protected $table = 'notes_commentaires';

    protected $fillable = [
        'id_client',
        'id_exprimer_abonnements'
    ];


    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function exprimer_commentaires() :BelongsTo
    {
        return $this->belongsTo(ExprimerCommentaire::class);
    }
}
