<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Paiement;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\CouponAbonnement;


class PourAbonner2Controller extends Controller
{
    
    public function pourabonner2($id_coupon)
    {
       
        $coupon = CouponAbonnement::find($id_coupon);
        $paiement = Paiement::find($coupon->id_paiement);
        $abonnement = Abonnement::find($paiement->id_abonnement);
        return view('pourAbonner2', [
            'coupon' => $coupon,
            'paiement'=>$paiement,
            'abonnement'=>$abonnement,
            
        ]);
    }
}
