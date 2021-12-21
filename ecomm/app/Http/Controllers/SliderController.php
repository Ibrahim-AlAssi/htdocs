<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    function slideradmin(){
        $slider = Slider::all();
        return view ("/slideradmin",compact('slider'));
    }

    function removeimage($id){
        Slider::destroy($id);
        return redirect('/slideradmin');
    }
    
    function replaceimage(Request $req){
        
        
        $input = $req->all();
        if ($req->hasFile('image')) {
            $imagepath = "public/images";
            $image = $req->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($imagepath, $imagename);
            $input['image'] = $imagename;
        }

        $pathimage = "/storage/images/$imagename";
        
        $slider =  Slider::find($req->id);
        $slider->slider = $pathimage;
        $slider->save();
        return redirect('/slideradmin');
        
    }

    function imagnew(Request $req){
        
        
        $input = $req->all();
        if ($req->hasFile('image')) {
            $imagepath = "public/images";
            $image = $req->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($imagepath, $imagename);
            $input['image'] = $imagename;
        }

        $pathimage = "/storage/images/$imagename";
        
        $slider = new Slider;
        $slider->slider = $pathimage;
        $slider->line1 = $req->line1;
        $slider->line2 = $req->line2;
        $slider->save();
        return redirect('/slideradmin');
        
    }
    
}
