<?php

namespace App\Http\Controllers;

use Hash;
use AuthenticatesClients;
use App\Models\ClientAbonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

class LoginController extends Controller
{

    public function guard()
    {
        return Auth::guard('client');
    }

    public function index()
    {
        $this->test_expiration();
        return view('login.index');
    }

   
    
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('client')->attempt($credentials)) {
          
            return redirect('offres');
        }

        return "<h2>Username or password invalid!</h2>";
    }

  //  public function logout(Request $request)
//{
    //Auth::logout();
 
    //$request->session()->invalidate();
 
    //$request->session()->regenerateToken();
 
  //  return to_route('login')->with('success','You are logging out');
//}

public function logout(Request $request)
{
    Auth::guard('client')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('loginC')->with('success', 'You have been logged out.');
}
public function test_expiration(){
    $expired_coupon = DB::table('coupon_abonnements')
    ->join('paiements', 'coupon_abonnements.id_paiement', '=', 'paiements.id')
    ->select('paiements.id_client', 'paiements.id_abonnement')
    ->where('coupon_abonnements.date_expiration', '<=', DB::raw('CURDATE()'))
    ->get();
    $client_abonne_to_delete = array();
    foreach($expired_coupon as $ec){
        $client_abonne_to_delete[] = ClientAbonne::where(['id_client' => $ec->id_client, 'id_abonnement' => $ec->id_abonnement])->latest()->first();
    }
    foreach($client_abonne_to_delete as $toDelete){
        if($toDelete != null){
            $toDelete->delete();
        }
    }
}
}
