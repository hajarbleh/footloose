<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function store(Request $request) {
        $lastRow = Slider::orderBy('id', 'desc')->first();
        if(!$lastRow) $id = 0;
        else $id = $lastRow->id;

        $slider = new Slider();
        $slider['title'] = $request->title;
        $slider['body'] = $request->body;
        if($request->link)
            $slider['link'] = $request->link;
        if($request->picture) {
            $dest = 'slider/'.($id+1);
            $file = $request->file('picture');
            $fileName = $file->getClientOriginalName();
            $path = $file->move($dest, $fileName);
            $path = str_replace('\\', '/', $path);
            $slider->photo = $path;
        }
        $slider->save();

        return back();
    }
    
    public function update(Request $request, $id){
        $slider = Slider::findOrFail($id);
        $slider['title'] = $request->title;
        $slider['body'] = $request->body;
        $slider['link'] = $request->link;
        if($request->picture) {
            $dest = 'slider/'.($id);
            $file = $request->file('picture');
            $fileName = $file->getClientOriginalName();
            $path = $file->move($dest, $fileName);
            $path = str_replace('\\', '/', $path);
            $slider->photo = $path;
        }
        $slider->save();
        return back();
    }
    
    public function destroy($id){
        Slider::destroy($id);
        return back();
    }
}
