<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CouponAbonnement extends Model
{
    use HasFactory;

    protected $table = 'coupon_abonnements';

    protected $fillable = [
        'id_paiement',
        'date_expiration',
        'code'
    ];

    public function paiement() :BelongsTo
    {
        return $this->belongsTo(Paiement::class);
    }

    public function code_q_r_s(): HasMany
    {
        return $this->hasMany(CodeQR::class, 'id_paiement');
    }
}
