<?php

namespace App\Http\Controllers;

use App\FFoTM;
use Illuminate\Http\Request;

class FFoTMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FFoTM  $fFoTM
     * @return \Illuminate\Http\Response
     */
    public function show(FFoTM $fFoTM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FFoTM  $fFoTM
     * @return \Illuminate\Http\Response
     */
    public function edit(FFoTM $fFoTM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FFoTM  $fFoTM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ffotm = FFoTM::findOrFail($id);
        $ffotm['base_id'] = $request->base_id;
        $ffotm['strap_id'] = $request->strap_id;
        $ffotm['tattoo_id'] = $request->tattoo_id;
        $ffotm->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FFoTM  $fFoTM
     * @return \Illuminate\Http\Response
     */
    public function destroy(FFoTM $fFoTM)
    {
        //
    }
}
