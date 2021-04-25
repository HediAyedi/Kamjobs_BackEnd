<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Emploi::with('langues','emploiTypes')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $emploi= Emploi::create($request->all());
        $emploi->emploiTypes()->attach($request->emploiTypes);
        $emploi->langues()->attach($request->langues);
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Emploi::with('langues','emploiTypes')->find($id);
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
        $existingEmploi= Emploi::find($id);
        if ($existingEmploi){
            $existingEmploi->fill($request->except('employeur_id'))->save();
            $existingEmploi->emploiTypes()->sync($request->emploiTypes);
            $existingEmploi->langues()->sync($request->langues);
            return $existingEmploi;
        }
        return "Emploi not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Emploi::destroy($id)){

            return "Emploi deleted successfully";

        }
        return "Emploi not found";
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  str  $nv
//     * @return \Illuminate\Http\Response
//     */
//    public function search($nv)
//    {
//
//        return Profile::where('niveau_experience','like','%'.$nv.'%')->get();
//    }
}
