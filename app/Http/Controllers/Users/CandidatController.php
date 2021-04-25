<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Candidat::with('cv','profile','candidatures','critiques')->get();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Candidat::with('cv','profile','candidatures','critiques')->find($id);

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
                'email' => 'required|email|unique:candidats,email,'.$id
            ]
        );

        $existingCandidat= Candidat::find($id);
        if ($existingCandidat){
            $existingCandidat->fill($request->except('mot_de_passe'))->save();
            return $existingCandidat;
        }
        return "Candidat not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Candidat::destroy($id)){
            return "Candidat deleted successfully";
        }
        return "Candidat not found";
    }
}
