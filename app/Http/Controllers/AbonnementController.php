<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Client_abonne;
use App\Models\ClientAbonne;
use App\Models\DateAbonnement;
use App\Models\ImageOffre;
use App\Models\Offre;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AbonnementController extends Controller
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
            'titre' => ['required', 'string', 'max:255'],
            'description_offre' => ['required', 'string', 'max:250'],
            'dateFinOffre' => ['required', 'date'],
            'nom' => ['required', 'string', 'max:255'],
            'type_abonnement' => ['required'],
            'image_offre' => ['required'],
            'description_abonnement' => ['required', 'string', 'max:250'],
            'trajet' => ['required', 'string', 'max:255'],
            'duree' => ['required', 'numeric', 'min:1'],
            'depart' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'jours' => 'required|array',
            'jours.*' => 'integer|min:1',
            'heur_debut_aller' => 'required|date_format:H:i',
            'heur_fin_aller' => 'required|date_format:H:i',
            'heur_debut_retour' => 'required|date_format:H:i',
            'heur_fin_retour' => 'required|date_format:H:i',
            'prix' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vehicules' => ['required'],
        ],
            [
                'titre.required' => 'Le champ titre est requis.',
                'titre.max' => 'Le champ titre ne doit pas dépasser :max caractères.',
                'description_offre.required' => 'Le champ description de offre est requis.',
                'description_offre.max' => 'Le champ description de offre ne doit pas dépasser :max caractères.',
                'dateFinOffre.required' => 'Le champ date de fin de offre est requis.',
                'dateFinOffre.date' => 'Le champ date de fin de offre doit être une date valide.',
                'nom.required' => 'Le champ nom est requis.',
                'nom.max' => 'Le champ nom ne doit pas dépasser :max caractères.',
                'type_abonnement.required' => 'Le champ type abonnement est requis.',
                'description_abonnement.required' => 'Le champ description de abonnement est requis.',
                'description_abonnement.max' => 'Le champ description de abonnement ne doit pas dépasser :max caractères.',
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
                'vehicules.required' => 'Abonnement requis des véhicules.',
            ]);

        $offre = new Offre();
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description_offre');
        $offre->dateFinOffre = $request->input('dateFinOffre');
        $offre->id_entreprise = $request->input('id_entreprise');

        $imageName = $request->input('image_offre');
        $imageOffre = ImageOffre::where('image', $imageName)->first();
        if ($imageOffre) {
            $offre->id_imageOffre = $imageOffre->id;
        }
        $offre->save();

        $id_offre = $offre->id;

        $abonnement = new Abonnement();
        $abonnement->nom = $request->input('nom');
        $abonnement->description = $request->input('description_abonnement');
        $abonnement->trajet = $request->input('trajet');
        //manque nombre de places
        $abonnement->id_offre = $id_offre;
        $abonnement->id_type_abonnement = $request->input('type_abonnement');
        $abonnement->duree = $request->input('duree');
        $abonnement->depart = $request->input('depart');
        $abonnement->destination = $request->input('destination');
        $abonnement->prix = $request->input('prix');
        $abonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $abonnement->heur_fin_aller = $request->input('heur_fin_aller');
        $abonnement->heur_debut_retour = $request->input('heur_debut_retour');
        $abonnement->heur_fin_retour = $request->input('heur_fin_retour');
        $abonnement->id_entreprise = $request->input('id_entreprise');
        $abonnement->save();

        $joursIds = $request->input('jours');

        foreach ($joursIds as $jourId) {
            $dateAbonnement = new DateAbonnement();
            $dateAbonnement->id_abonnement = $abonnement->id;
            $dateAbonnement->id_jour = $jourId;
            $dateAbonnement->save();
        }

        $vehiculeIds = $request->input('vehicules');


        if (is_array($vehiculeIds)) {
            // Plusieurs véhicules sont sélectionnés
            foreach ($vehiculeIds as $vehiculeId) {
                // Check if the vehicle exists
                $vehicule = Vehicule::find($vehiculeId);

                if ($vehicule) {
                    // Update the id_abonnement field
                    $vehicule->id_abonnement = $abonnement->id; // Replace $id_abonnement with the desired value
                    $vehicule->save();
                }
            }
        } else {
            // Un seul véhicule est sélectionné
            $vehicule = Vehicule::find($vehiculeIds);

            if ($vehicule) {
                $vehicule->id_abonnement = $abonnement->id; // Replace $id_abonnement with the desired value
                $vehicule->save();
            }
        }

        return redirect('/MesOffres')->with('success', "Offre Abonnemnt est ajouter avec succee");
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
            'titre' => ['required', 'string', 'max:255'],
            'description_offre' => ['required', 'string', 'max:500'],
            'dateFinOffre' => ['required', 'date'],
            'nom' => ['required', 'string', 'max:255'],
            'type_abonnement' => ['required'],
            'image_offre' => ['required'],
            'description_abonnement' => ['required', 'string', 'max:500'],
            'trajet' => ['required', 'string', 'max:255'],
            'duree' => ['required', 'numeric', 'min:1'],
            'depart' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'jours' => 'required|array',
            'jours.*' => 'integer|min:1',
            'heur_debut_aller' => 'required',
            'heur_fin_aller' => 'required',
            'heur_debut_retour' => 'required',
            'heur_fin_retour' => 'required',
            'prix' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vehicules' => ['required'],
        ],
            [
                'titre.required' => 'Le champ titre est requis.',
                'titre.max' => 'Le champ titre ne doit pas depasser :max caracteres.',
                'description_offre.required' => 'Le champ description de offre est requis.',
                'description_offre.max' => 'Le champ description de offre ne doit pas depasser :max caracteres.',
                'dateFinOffre.required' => 'Le champ date de fin de offre est requis.',
                'dateFinOffre.date' => 'Le champ date de fin de offre doit etre une date valide.',
                'nom.required' => 'Le champ nom est requis.',
                'nom.max' => 'Le champ nom ne doit pas depasser :max caracteres.',
                'type_abonnement.required' => 'Le champ type abonnement est requis.',
                'description_abonnement.required' => 'Le champ description de abonnement est requis.',
                'description_abonnement.max' => 'Le champ description de abonnement ne doit pas depasser :max caracteres.',
                'trajet.required' => 'Le champ trajet est requis.',
                'trajet.max' => 'Le champ trajet ne doit pas depasser :max caracteres.',
                'duree.required' => 'Le champ duree est requis.',
                'duree.numeric' => 'Le champ duree doit etre un nombre.',
                'duree.min' => 'Le champ duree doit etre superieur a :min.',
                'depart.required' => 'Le champ depart est requis.',
                'depart.max' => 'Le champ depart ne doit pas depasser :max caracteres.',
                'destination.required' => 'Le champ destination est requis.',
                'destination.max' => 'Le champ destination ne doit pas depasser :max caracteres.',
                'jours.required' => 'Le champ jours est requis.',
                'jours.array' => 'Le champ jours doit être un tableau.',
                'jours.*.integer' => 'Les valeurs du champ jours doivent être des entiers.',
                'jours.*.min' => 'Les valeurs du champ jours doivent etre superieures a :min.',
                'heur_debut_aller.required' => 'Le champ heure de début aller est requis.',
                'heur_debut_aller.date_format' => 'Le champ heure de début aller doit être au format H:i.',
                'heur_fin_aller.required' => 'Le champ heure de fin aller est requis.',
                'heur_fin_aller.date_format' => 'Le champ heure de fin aller doit être au format H:i.',
                'heur_debut_retour.required' => 'Le champ heure de début retour est requis.',
                'heur_debut_retour.date_format' => 'Le champ heure de début retour doit être au format H:i.',
                'heur_fin_retour.required' => 'Le champ heure de fin retour est requis.',
                'heur_fin_retour.date_format' => 'Le champ heure de fin retour doit être au format H:i.',
                'prix.required' => 'Le champ prix est requis.',
                'prix.numeric' => 'Le champ prix doit etre un nombre.',
                'prix.min' => 'Le champ prix doit etre supérieur a :min.',
                'prix.regex' => 'Le champ prix doit avoir un format valide.',
                'vehicules.required' => 'Abonnement requis des véhicules.',
            ]);

        $abonnement = Abonnement::findOrFail($id);

        $offre = Offre::findOrFail($abonnement->id_offre);
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description_offre');
        $offre->dateFinOffre = $request->input('dateFinOffre');
        $offre->id_entreprise = $request->input('id_entreprise');

        $imageName = $request->input('image_offre');
        $imageOffre = ImageOffre::where('image', $imageName)->first();
        if ($imageOffre) {
            $offre->id_imageOffre = $imageOffre->id;
        }
        $offre->save();

        $id_offre = $offre->id;

        $abonnement->nom = $request->input('nom');
        $abonnement->description = $request->input('description_abonnement');
        $abonnement->trajet = $request->input('trajet');
        //manque nombre de places
        $abonnement->id_offre = $id_offre;
        $abonnement->id_type_abonnement = $request->input('type_abonnement');
        $abonnement->duree = $request->input('duree');
        $abonnement->depart = $request->input('depart');
        $abonnement->destination = $request->input('destination');
        $abonnement->prix = $request->input('prix');
        $abonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $abonnement->heur_fin_aller = $request->input('heur_fin_aller');
        $abonnement->heur_debut_retour = $request->input('heur_debut_retour');
        $abonnement->heur_fin_retour = $request->input('heur_fin_retour');
        $abonnement->id_entreprise = $request->input('id_entreprise');
        $abonnement->save();

        $joursIds = $request->input('jours');
        $existingJours = DateAbonnement::where('id_abonnement', $abonnement->id)->pluck('id_jour')->toArray();

        // Supprimer les jours supplémentaires
        $joursToDelete = array_diff($existingJours, $joursIds);
        DateAbonnement::where('id_abonnement', $abonnement->id)->whereIn('id_jour', $joursToDelete)->delete();

        // Ajouter les nouveaux jours
        $joursToAdd = array_diff($joursIds, $existingJours);
        foreach ($joursToAdd as $jourId) {
            $dateAbonnement = new DateAbonnement();
            $dateAbonnement->id_abonnement = $abonnement->id;
            $dateAbonnement->id_jour = $jourId;
            $dateAbonnement->save();
        }

        // Mettre à jour les jours existants
        $joursToUpdate = array_intersect($joursIds, $existingJours);
        foreach ($joursToUpdate as $jourId) {
            $dateAbonnement = DateAbonnement::where('id_abonnement', $abonnement->id)->where('id_jour', $jourId)->first();
            $dateAbonnement->save();
        }

        $vehiculeIds = $request->input('vehicules');
        $existingVehicules = Vehicule::where('id_abonnement', $abonnement->id)->pluck('id')->toArray();

        // Supprimer les véhicules existants qui ne sont pas dans la nouvelle liste
        $vehiculesToDelete = array_diff($existingVehicules, $vehiculeIds);
        Vehicule::whereIn('id', $vehiculesToDelete)->update(['id_abonnement' => null]);

        // Mettre à jour les véhicules existants et ajouter les nouveaux véhicules
        foreach ($vehiculeIds as $vehiculeId) {
            $vehicule = Vehicule::find($vehiculeId);
            if ($vehicule) {
                // Mettre à jour la relation avec l'abonnement
                $vehicule->id_abonnement = $abonnement->id;
                $vehicule->save();
            }
        }

        return redirect('/MesOffres')->with('success', "offre abonnemnt est modifier avec succee");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $offre = Offre::findOrFail($abonnement->id_offre);
        $titre = $offre->titre;
        $offre->delete();

        return redirect('/MesOffres')->with('success', 'Offre ' . $titre . ' a ete suprime avec succee!');
    }
    public function destroyAbn(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $offre = Offre::findOrFail($abonnement->id_offre);
        $titre = $offre->titre;
        $nom = $abonnement->nom;
        $offre->delete();
        $abonnement->delete();

        return redirect('/MesOffres')->with('success', 'Abonnement ' . $nom . ' de offre ' . $titre . ' sont ete suprime avec succee!');
    }

    public function abonner($id){
        $abonnement = Abonnement::find($id);
        ClientAbonne::create([
            'id_client' => auth()->user()->id,
            'id_abonnement' => $abonnement->id,
            'id_entreprise' => $abonnement->id_entreprise
        ]);
        return redirect('pourabonner/' . $abonnement->id);
    }
}
