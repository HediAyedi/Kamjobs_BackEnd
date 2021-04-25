<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Admin::find($id);
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
                'email' => 'required|email|unique:admins,email,'.$id
            ]
        );

        $existingAdmin= Admin::find($id);
        if ($existingAdmin){
            $existingAdmin->fill($request->except('mot_de_passe'))->save();
            return $existingAdmin;
        }
        return "Admin not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Admin::destroy($id)){
            return "Admin deleted successfully";
        }
        return "Admin not found";
    }
}
