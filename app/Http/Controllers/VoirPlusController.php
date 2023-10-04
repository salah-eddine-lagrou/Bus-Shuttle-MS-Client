<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\ClientAbonne;
use App\Models\ImageOffre;
use Illuminate\Http\Request;

class VoirPlusController extends Controller
{
    public function detail($id)
    {
        $abonnement = Abonnement::with('offres')->find($id);
        $offre = ClientAbonne::where(['id_abonnement' => $abonnement->id, 'id_client' => auth()->user()->id])->get();
        if(empty($offre[0])){
            $etat = false;
        }
        else{
            $etat = true;
        }
        $image_offre = ImageOffre::find($abonnement->offres->id_imageOffre);
        return view('detail', [
            'abonnement' => $abonnement,
            'etat' => $etat,
            'image_offre' => $image_offre
        ]);
    }

}
