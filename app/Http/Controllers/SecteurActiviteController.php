<?php

namespace App\Http\Controllers;

use App\Models\SecteurActivite;
use Illuminate\Http\Request;

class SecteurActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SecteurActivite::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return SecteurActivite::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SecteurActivite::find($id);

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
        $secteur_activite= SecteurActivite::find($id);
        if ($secteur_activite){
            $secteur_activite->fill($request->except('employeur_id'))->save();
            return $secteur_activite;
        }
        return "Secteur activite not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (SecteurActivite::destroy($id)){

            return "Secteur activite deleted successfully";

        }
        return "Secteur activite not found";
    }
}
