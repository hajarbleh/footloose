<?php

namespace App\Http\Controllers;

use App\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
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
        $lastRow = Base::orderBy('id', 'desc')->first();
        $base = new Base();
        $base['name'] = $request->name;
        $base['color'] = $request->color;
        $base['size'] = $request->size;
        $base['category_id'] = $request->category;
        $base['stock'] = $request->stock;
        //handle picture
        $dest = 'base/'.($lastRow->id+1);
        $file = $request->file('picture');
        $fileName = $file->getClientOriginalName();
        $path = $file->move($dest, $fileName);
        $base->picture = $path;
        $base->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function show(Base $base)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function edit(Base $base)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $base = Base::findOrFail($id);
        $base->name = $request->name;
        $base->color = $request->color;
        $base->size = $request->size;
        $base->stock = $request->stock;
        if($request->picture) {
            $dest = 'base/'.$id;
            $file = $request->file('picture');
            $fileName = $file->getClientOriginalName();
            $path = $file->move($dest, $fileName);
            $base->picture = $path;
        }
        $base->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Base  $base
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Base::findorfail($id)->delete();
    }

    public function detail($id)
    {
        $base = Base::where('bases.id', '=', $id)
            ->leftJoin('categories', 'bases.category_id', '=', 'categories.id')
            ->select('bases.*', 'categories.name as category')
            ->first();
        return response()->json([
           'success' => true,
           'data' => $base,
        ]);
    }
}