<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marque' => ['required', 'string', 'max:255'],
            'capacite' => ['required', 'numeric', 'min:1'],
            'dateMiseEnservice' => ['required'],
            'immatriculation' => ['required', 'regex:/^[A-Z]{2}-\d{3}-[A-Z]{2}$/i', 'string', 'max:10'],
        ], [
            'marque.required' => 'Le champ marque est obligatoire.',
            'capacite.required' => 'Le champ capacite est obligatoire.',
            'capacite.min' => 'La capacité doit être supérieure à 0.',
            'dateMiseEnservice.required' => 'Le champ date de mise en service est obligatoire.',
            'immatriculation.required' => 'Le champ immatriculation est obligatoire.',
            'immatriculation.regex' => 'Le format de l\'immatriculation est invalide (ex: XX-123-XX).',
        ]);

        $vehicule = new Vehicule();
        $vehicule->marque = $request->input('marque');
        $vehicule->capacite = $request->input('capacite');
        $vehicule->dateMiseEnservice = $request->input('dateMiseEnservice');
        $vehicule->immatriculation = $request->input('immatriculation');
        $vehicule->id_entreprise = $request->input('id_entreprise');
        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Le véhicule a été ajouté avec succès.');
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

        $validatedData = $request->validate([
            'marque' => ['required', 'string', 'max:255'],
            'capacite' => ['required', 'numeric', 'min:1'],
            'dateMiseEnservice' => ['required'],
            'immatriculation' => ['required', 'regex:/^[A-Z]{2}-\d{3}-[A-Z]{2}$/i', 'string', 'max:10'],
        ], [
            'titre.required' => 'Le champ titre est requis.',
            'titre.max' => 'Le champ titre ne doit pas dépasser :max caractères.',
            'description_offre.required' => 'Le champ description de l\'offre est requis.',
            'description_offre.max' => 'Le champ description de l\'offre ne doit pas dépasser :max caractères.',
            'dateFinOffre.required' => 'Le champ date de fin de l\'offre est requis.',
            'dateFinOffre.date' => 'Le champ date de fin de l\'offre doit être une date valide.',
            'nom.required' => 'Le champ nom est requis.',
            'nom.max' => 'Le champ nom ne doit pas dépasser :max caractères.',
            'type_abonnement.required' => 'Le champ type d\'abonnement est requis.',
            'description_abonnement.required' => 'Le champ description de l\'abonnement est requis.',
            'description_abonnement.max' => 'Le champ description de l\'abonnement ne doit pas dépasser :max caractères.',
            'trajet.required' => 'Le champ trajet est requis.',
            'trajet.max' => 'Le champ trajet ne doit pas dépasser :max caractères.',
            'duree.required' => 'Le champ durée est requis.',
            'duree.numeric' => 'Le champ durée doit être un nombre.',
            'duree.min' => 'Le champ durée doit être supérieur à :min.',
            'depart.required' => 'Le champ départ est requis.',
            'depart.max' => 'Le champ départ ne doit pas dépasser :max caractères.',
            'destination.required' => 'Le champ destination est requis.',
            'destination.max' => 'Le champ destination ne doit pas dépasser :max caractères.',
            'jours.required' => 'Le champ jours est requis.',
            'jours.array' => 'Le champ jours doit être un tableau.',
            'jours.*.integer' => 'Les valeurs du champ jours doivent être des entiers.',
            'jours.*.min' => 'Les valeurs du champ jours doivent être supérieures à :min.',
            'heur_debut_aller.required' => 'Le champ heure de début aller est requis.',
            'heur_debut_aller.date_format' => 'Le champ heure de début aller doit être au format H:i.',
            'heur_fin_aller.required' => 'Le champ heure de fin aller est requis.',
            'heur_fin_aller.date_format' => 'Le champ heure de fin aller doit être au format H:i.',
            'heur_debut_retour.required' => 'Le champ heure de début retour est requis.',
            'heur_debut_retour.date_format' => 'Le champ heure de début retour doit être au format H:i.',
            'heur_fin_retour.required' => 'Le champ heure de fin retour est requis.',
            'heur_fin_retour.date_format' => 'Le champ heure de fin retour doit être au format H:i.',
            'prix.required' => 'Le champ prix est requis.',
            'prix.numeric' => 'Le champ prix doit être un nombre.',
            'prix.min' => 'Le champ prix doit être supérieur à :min.',
            'prix.regex' => 'Le champ prix doit avoir un format valide.',
        ]);

        $vehicule = Vehicule::findOrFail($id);
        $vehicule->marque = $request->input('marque');
        $vehicule->capacite = $request->input('capacite');
        $vehicule->dateMiseEnservice = $request->input('dateMiseEnservice');
        $vehicule->immatriculation = $request->input('immatriculation');

        $vehicule->save();

        return redirect('/vehicules')->with('success', 'la vehicule ' . $vehicule->marque . ' a ete modifier avec succee!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehMarque = $vehicule->marque;
        $vehicule->delete();

        return redirect('/vehicules')->with('success', 'la vehicule ' . $vehMarque . ' a ete suprime avec succee!');
    }
}
