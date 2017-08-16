<?php

namespace App\Http\Controllers;

use App\Strap;
use Illuminate\Http\Request;

class StrapController extends Controller
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
        $lastRow = Strap::orderBy('id', 'desc')->first();
        if(!$lastRow) {
            $id = 0;
        }
        else $id = $lastRow->id;
        $strap = new Strap();
        $strap['name'] = $request->name;
        $strap['color'] = $request->color;
        $strap['size'] = $request->size;
        $strap['category_id'] = $request->category;
        $strap['stock'] = $request->stock;
        $dest = 'strap/'.($id+1);
        $file = $request->file('picture');
        $fileName = $file->getClientOriginalName();
        $path = $file->move($dest, $fileName);
        $strap->picture = $path;
        $strap->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Strap  $strap
     * @return \Illuminate\Http\Response
     */
    public function show(Strap $strap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Strap  $strap
     * @return \Illuminate\Http\Response
     */
    public function edit(Strap $strap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Strap  $strap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $strap = Strap::findOrFail($id);
        $strap->name = $request->name;
        $strap->color = $request->color;
        $strap->size = $request->size;
        $strap->stock = $request->stock;
        if($request->picture) {
            $dest = 'strap/'.$id;
            $file = $request->file('picture');
            $fileName = $file->getClientOriginalName();
            $path = $file->move($dest, $fileName);
            $strap->picture = $path;
        }
        $strap->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Strap  $strap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Strap $strap)
    {
        //
    }

    public function detail($id)
    {
        $strap = Strap::where('straps.id', '=', $id)
            ->leftJoin('categories', 'categories.id', '=', 'straps.category_id')
            ->select('straps.*', 'categories.name as category')
            ->first();
        return response()->json([
           'success' => true,
           'data' => $strap,
        ]);
    }
}
