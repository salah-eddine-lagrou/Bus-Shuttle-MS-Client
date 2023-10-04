<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CreditCardType;

class CarteController extends Controller
{
    public function verifierCarte(Request $request)
    {
        $request->validate([
            'numeroVisa' => ['nullable', new CreditCardType('visa')],
            'numeroMastercard' => ['nullable', new CreditCardType('mastercard')],
        ]);
    
        // Si la validation réussit, cela signifie que le numéro de carte est soit Visa, soit Mastercard
    
        if ($request->filled('numeroVisa')) {
            // Le champ "numeroVisa" est rempli, il s'agit d'une carte Visa
            return 'Visa';
        } elseif ($request->filled('numeroMastercard')) {
            // Le champ "numeroMastercard" est rempli, il s'agit d'une carte Mastercard
            return 'Mastercard';
        } else {
            // Aucun champ n'est rempli, il y a une erreur
            return 'Aucune carte sélectionnée.';
        }
    }
    
}