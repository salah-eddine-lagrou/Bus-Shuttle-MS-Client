<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\Abonnement;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PourAbonnerController extends Controller
{
     public function pourabonner($id)
    {
        if(!session('code_error')){
            $verificationCode = $this->generateVerificationCode();
            Verification::create([
                'code' => $verificationCode,
                'id_client' => auth()->user()->id
            ]);
            Mail::to(auth()->user()->email)->send(new VerificationCodeMail($verificationCode));
        }
        $abonnement = Abonnement::find($id);
        return view('pourAbonner', [
            'abonnement' => $abonnement,
        ]);
    }

    private function generateVerificationCode($length = 6)
    {
        $characters = '0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
}
