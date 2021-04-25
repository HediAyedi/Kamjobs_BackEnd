<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Employeur;
use Illuminate\Http\Request;

class EmployeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employeur::with('emplois','secteurActivite')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employeur::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
                'nom' => 'required',
                'mot_de_passe' => 'required',
                'email' => 'required|email|unique:employeurs,email,'.$id
            ]
        );

        $existingEmployeur= Employeur::find($id);

        if ($existingEmployeur){

            $existingEmployeur->fill($request->except('mot_de_passe'))->save();
            return $existingEmployeur;
        }
        return "Employeur not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Employeur::destroy($id)){

            return "Employeur deleted successfully";
        }
        return "Employeur not found";
    }
}
