<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tester extends Controller
{

    public function offres()
    {
        return view('template.offres');
    }
    public function tables()
    {
        return view('template.tables');
    }
    public function profile()
    {
        return view('template.profile');
    }
    public function blank()
    {
        return view('template.billing');
    }
    public function clients()
    {
        return view('template.clients');
    }
    public function voyages()
    {
        return view('template.voyages');
    }
    public function commentaires()
    {
        return view('template.commentaires');
    }
    public function vehicules()
    {
        return view('template.vehicules');
    }
    public function comments()
    {
        return view('template.comments');
    }
    public function abonnement()
    {
        return view('template.abonnement');
    }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
