<?php

namespace App\Http\Controllers;

use App\WebDetail;
use Illuminate\Http\Request;

class WebDetailController extends Controller
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
     * @param  \App\WebDetail  $webDetail
     * @return \Illuminate\Http\Response
     */
    public function show(WebDetail $webDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WebDetail  $webDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDetail $webDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WebDetail  $webDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $webDetail = WebDetail::first();
        $webDetail['email'] = $request->email;
        $webDetail['twitter'] = $request->twitter;
        $webDetail['facebook'] = $request->facebook;
        $webDetail['instagram'] = $request->instagram;
        $webDetail['line'] = $request->line;
        $webDetail->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WebDetail  $webDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebDetail $webDetail)
    {
        //
    }
}
