<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class RegisterController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'adresse' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@#$%]).+$/|confirmed',
        ], [
            'password.regex' => 'Le mot de passe doit contenir au moins 8 caractères, dont au moins un numéro, une majuscule et un symbole (@, #, $, %)',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        Client::create([
            'nom' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'adresse' => $request->input('adresse'),
            'password' => Hash::make($request->input('password')),
        ]);

        return view('login.index');
    }
}


