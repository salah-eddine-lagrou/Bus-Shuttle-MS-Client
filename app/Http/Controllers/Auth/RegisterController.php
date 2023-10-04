<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'description' => ['required', 'string', 'max:500'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'siteWeb' => ['nullable', 'string', 'max:255', 'url'],
            'secteur' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Entreprise
     */

    protected function create(array $data)
    {
        
        if (isset($data['image'])) {
            $imageName = $data['image']->getClientOriginalName();
        } else {
            $imageName = null;
        }
        // $data['image']->store('public/images/');
        // $data['image']->storeAs('public/images/', $imageName);

        // $imagePath = 'public/images/' . $imageName; // Chemin de stockage complet de l'image
        // $url = Storage::url($imagePath); // URL de l'image

        // $path = $data['image']->store(public_path('images'));
        // $url = Storage::url('D:/aFileProjects/Laravel/projetFinEtude/public/images/' . $imageName);

        // if (isset($data['image']) && $data['image']->isValid()) {
        //     $path = $data['image']->store('public/images');
        //     $url = asset($path);
        //     // ... enregistrement en base de données ou autre traitement
        // }

        return Entreprise::create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'description' => $data['description'],
            'siteWeb' => $data['siteWeb'],
            'secteur' => $data['secteur'],
            'image' => $imageName, // Stocker l'URL de l'image dans la base de données
        ]);
    }

    public function registration()
    {
        return view('auth.register');
    }
    public function logging()
    {
        return view('auth.logging');
    }

}
