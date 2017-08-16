<?php

namespace App\Http\Controllers;

use App\Tattoo;
use Illuminate\Http\Request;

class TattooController extends Controller
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
        $lastRow = Tattoo::orderBy('id', 'desc')->first();
        if(!$lastRow) {
            $id = 0;
        }
        else $id = $lastRow->id;
        $tattoo = new Tattoo();
        $tattoo['name'] = $request->name;
        $tattoo['color'] = $request->color;
        $tattoo['category_id'] = $request->category;
        $tattoo['stock'] = $request->stock;
        $dest = 'tattoo/'.($id+1);
        $file = $request->file('picture');
        $fileName = $file->getClientOriginalName();
        $path = $file->move($dest, $fileName);
        $tattoo->picture = $path;
        $tattoo->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tattoo  $tattoo
     * @return \Illuminate\Http\Response
     */
    public function show(Tattoo $tattoo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tattoo  $tattoo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tattoo $tattoo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tattoo  $tattoo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tattoo = Tattoo::findOrFail($id);
        $tattoo->name = $request->name;
        $tattoo->color = $request->color;
        $tattoo->stock = $request->stock;
        if($request->picture) {
            $dest = 'tattoo/'.$id;
            $file = $request->file('picture');
            $fileName = $file->getClientOriginalName();
            $path = $file->move($dest, $fileName);
            $tattoo->picture = $path;
        }
        $tattoo->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tattoo  $tattoo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tattoo $tattoo)
    {
        //
    }

    public function detail($id)
    {
        $tattoo = Tattoo::where('tattoos.id', '=', $id)
            ->leftJoin('categories', 'categories.id', '=', 'tattoos.category_id')
            ->select('tattoos.*', 'categories.name as category')
            ->first();
        return response()->json([
           'success' => true,
           'data' => $tattoo,
        ]);
    }
}
