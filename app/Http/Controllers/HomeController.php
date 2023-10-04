<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Client;
use App\Models\ClientAbonne;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }

    public function clientProfile(){
        $CliAbon = ClientAbonne::with('abonnements.offres.imagesOffre')->where(['id_client' => auth()->user()->id])->get();
        $abonnementNonPayee = array();
        $abonnementPayee = array();
        foreach($CliAbon as $cli){
            $etat = Paiement::where(['id_client' =>  auth()->user()->id, 'id_abonnement' => $cli->id_abonnement])->first();
            if($etat == null){
                $abonnementNonPayee[] = $cli;
            }else{
                $abonnementPayee[] = $cli;
            }
        }
        return view('userManagement.user_profile', [
            'client' => auth()->user(),
            'abonnement_payee' => $abonnementPayee,
            'abonnement_need_to_pay' => $abonnementNonPayee
        ]);
    }

    public function updateProfile(Request $request, Client $client)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
           
        ]);
    
        
        $client->update($validatedData);
    
        
        return redirect('page/client/profile');
    }

    public function editClientProfile(){
        return view('userManagement.updateProfile');
    }
    public function updateImage(Request $request, Client $client){
        if ($request->file('imgPath')) {
            try {
                $file = $request->file('imgPath');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/profiles'), $fileName);
                $formfields['imgPath'] = $fileName;
            } catch (Exception $e) {
                dd($e);
            }
        } else {
            $formfields['imgPath'] = auth()->user()->imgPath;
        }
        $client->update($formfields);
        return back();
    }

}
