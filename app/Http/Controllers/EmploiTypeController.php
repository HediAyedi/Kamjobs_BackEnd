<?php

namespace App\Http\Controllers;

use App\Models\EmploiType;
use Illuminate\Http\Request;

class EmploiTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmploiType::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return EmploiType::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EmploiType::find($id);

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
        $emploi_type= EmploiType::find($id);
        if ($emploi_type){
            $emploi_type->fill($request->all())->save();
            return $emploi_type;
        }
        return "Emploi type not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (EmploiType::destroy($id)){

            return "Emploi type deleted successfully";

        }
        return "Emploi type not found";
    }
}
