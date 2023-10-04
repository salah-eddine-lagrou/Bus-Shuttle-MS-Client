<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Compte;
use App\Models\CouponAbonnement;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use App\Models\Verification;
use Illuminate\Support\Facades\Mail;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 /**
     * Génère un code de vérification aléatoire.
     *
     * @param int $length La longueur du code de vérification
     * @return string Le code de vérification généré
     */
    
    
     public function store(Request $request, Abonnement $abonnement)
     {

        $verificationCode = $request->input('verification_code');

        $code_verification = Verification::where(['id_client' => auth()->user()->id, 'code' => $verificationCode])->latest()->first();

        if($code_verification == null){
            return redirect()->back()->with('code_error', 'Le code de verification est invalide!');
        }
 
        $method = $request->input('method_paiment');
 
         switch($method){
             case 'visa':
                 $visa = $request->input('code_card');
                 if (!empty($visa)) {
                     $pattern = '/^4[0-9]{12}(?:[0-9]{3})?$/';
                     if (!preg_match($pattern, $visa)) {
                         return redirect()->back()->with('error', 'Le compte Visa est invalide.');
                     }
                 }
                 break;
             case 'mastercard':
                 $mastercard = $request->input('code_card');
                     if (!empty($mastercard)) {
                         $pattern = '/^5[1-5][0-9]{14}$/';
                         if (!preg_match($pattern, $mastercard)) {
                             return redirect()->back()->with('error', 'Le compte Mastercard est invalide.');
                         }
                     }
                 break;
             default:
             break;
         }
 
         
         
 
         $paymentData = [
             'id_abonnement' => $abonnement->id,
             'methodePaiment' => $request->input('method_paiment'),
             'montant' => $abonnement->prix,
             'id_client' => auth()->user()->id,
         ];
     
         $payment = Paiement::create($paymentData);
     
         $compteData = [
             'id_client' => auth()->user()->id,
             'montant' => $payment->montant,
             'code' => $request->input('code_card')
         ];
 
         $compte = Compte::create($compteData);
 
         
         $currentDate = Carbon::now();
         $expirationDate = $currentDate->addMonth();
 
         $code = $currentDate->format('dmY');
 
         $code .= '-'; $code .= auth()->user()->id;  $code .= '-';
         $code .= $abonnement->id;
 
         $couponData = [
             'id_paiement' => $payment->id,
             'date_expiration' => $expirationDate,
             'code' => $code
         ];
 
         $coupon = CouponAbonnement::create($couponData);




         return redirect('/pourabonner2/'. $coupon->id);
 
 
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
