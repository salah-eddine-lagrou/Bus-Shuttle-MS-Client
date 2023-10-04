<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
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
        //
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
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'description' => ['required', 'string', 'max:500'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'siteWeb' => ['nullable', 'string', 'max:255', 'url'],
            'secteur' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        // Update the data
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->nom = $request->input('nom');
        $entreprise->email = $request->input('email');
        $entreprise->description = $request->input('description');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->siteWeb = $request->input('siteWeb', null);
        $entreprise->secteur = $request->input('secteur');
        if ($request->hasFile('image')) {
            $entreprise->image = $imageName;
        }
        // Update other fields as needed
        $entreprise->save();

        // Entreprise::whereId($id)->update($validatedData);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
