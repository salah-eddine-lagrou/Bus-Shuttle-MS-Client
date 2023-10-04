<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeQR extends Model
{
    use HasFactory;

    protected $table = 'code_q_r_s';

    protected $fillable = [
        'date_creation',
        'date_expiration',
        'id_coupon_abonnement'
    ];

    public function coupon_abonnements(): BelongsTo
    {
        return $this->belongsTo(CouponAbonnement::class);
    }
}
