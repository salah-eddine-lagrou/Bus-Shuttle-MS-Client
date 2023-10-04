<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        return view('verification');
    }

    public function verify(Request $request)
    {
        $mastercard = $request->input('mastercard');
        $visa = $request->input('visa');

        if ($mastercard && preg_match('/^5[1-5][0-9]{14}$/', $mastercard)) {
            // Numéro de compte Mastercard valide
            return "Numéro de compte Mastercard valide : " . $mastercard;
        } elseif ($visa && preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $visa)) {
            // Numéro de compte Visa valide
            return "Numéro de compte Visa valide : " . $visa;
        } else {
            // Ni Mastercard ni Visa
            return "Numéro de compte invalide";
        }
    }
}
