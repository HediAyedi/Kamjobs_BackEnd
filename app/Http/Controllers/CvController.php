<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cv::with('competences','domaines','experiences','profile.langues')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cv= Cv::create($request->all());
        $cv->competences()->attach($request->competences);
        $cv->domaines()->attach($request->domaines);
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
        return Cv::with('competences','domaines','experiences','profile.langues')->find($id);
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
        $existingCv= Cv::find($id);
        if ($existingCv){
            $existingCv->fill($request->all())->save();
            $existingCv->competences()->sync($request->competences);
            $existingCv->domaines()->sync($request->domaines);
            return $existingCv;
        }
        return "Cv not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Cv::destroy($id)){

            return "Cv deleted successfully";

        }
        return "Cv not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $nv
     * @return \Illuminate\Http\Response
     */
    public function search($nv)
    {

        return Cv::where('niveau_experience','like','%'.$nv.'%')->get();
    }
}
