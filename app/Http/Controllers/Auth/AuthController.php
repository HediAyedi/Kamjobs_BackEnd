<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\CandidatRequest;
use App\Http\Requests\EmployeurRequest;
use App\Http\Requests\LogInRequest;
use App\Models\Admin;
use App\Models\Candidat;
use App\Models\Employeur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Store a newly created Admin in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerAdmin(AdminRequest $request)
    {
        // Creating admin
        $admin = Admin::create(array(
            'nom' => $request->nom,
            'email' => $request->email,
            'image' => $request->image,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
        ));

        // Creating token
        $token = $admin->createToken('myapptoken')->plainTextToken;

        // Creating response
        $response = [
            'admin' => $admin,
            'token' => $token
        ];
        auth()->setUser($admin);
        return response($response, 201);
    }

    // Logging in as admin
    public function logInAdmin(LogInRequest $request)
    {
        // Checking email
        $admin = Admin::where('email', $request->email)->first();

        //Checking mot de passe
        if (!$admin || !Hash::check($request->mot_de_passe, $admin->mot_de_passe)) {
            return response([
                'message' => 'wrong info'
            ], 401);
        }

        //Creating token
        $token = $admin->createToken('myapptoken')->plainTextToken;

        // Creating response
        $response = [
            'admin' => $admin,
            'token' => $token
        ];
        auth()->setUser($admin);
        return response($response, 201);
    }

    /**
     * Store a newly created Employeur in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerEmployeur(EmployeurRequest $request)
    {
        //Creating employeur
        $employeur = Employeur::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'nom_entreprise' => $request->nom_entreprise,
            'description_entreprise' => $request->description_entreprise,
            'matricule' => $request->matricule,
            'site_web' => $request->site_web,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'logo' => $request->logo,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
        ]);

        //Creating token
        $token = $employeur->createToken('myapptoken')->plainTextToken;

        // Creating response
        $response = [
            'employeur' => $employeur,
            'token' => $token
        ];
        auth()->setUser($employeur);
        return response($response, 201);
    }

    // Logging in as employeur
    public function logInEmployeur(LogInRequest $request)
    {
        // Checking email
        $employeur = Employeur::where('email', $request->email)->first();

        //Checking mot de passe
        if (!$employeur || !Hash::check($request->mot_de_passe, $employeur->mot_de_passe)) {
            return response([
                'message' => 'wrong info'
            ], 401);
        }

        //Creating token
        $token = $employeur->createToken('myapptoken')->plainTextToken;

        // Creating response
        $response = [
            'employeur' => $employeur,
            'token' => $token
        ];
        auth()->setUser($employeur);
        return response($response, 201);
    }


    /**
     * Store a newly created Candidat in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerCandidat(CandidatRequest $request)
    {
        //Creating candidat
        $candidat = Candidat::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
        ]);

        //Creating token
        $token = $candidat->createToken('myapptoken')->plainTextToken;

        // Creating response
        $response = [
            'candidat' => $candidat,
            'token' => $token
        ];
        auth()->setUser($candidat);
        return response($response, 201);
    }

    // Logging in as candidat
    public function logInCandidat(LogInRequest $request)
    {
        // Checking email
        $candidat = Candidat::where('email', $request->email)->first();

        //Checking mot de passe
        if (!$candidat || !Hash::check($request->mot_de_passe, $candidat->mot_de_passe)) {
            return response([
                'message' => 'wrong info'
            ], 401);
        }

        //Creating token
        $token = $candidat->createToken('myapptoken')->plainTextToken;

        //Creating response
        $response = [
            'candidat' => $candidat,
            'token' => $token
        ];
        auth()->setUser($candidat);
        return response($response, 201);
    }


    // Logging out
    public function logOut(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
