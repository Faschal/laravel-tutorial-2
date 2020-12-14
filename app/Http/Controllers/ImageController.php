<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function showResizeImage()
    {
        return view('resize-image');
    }

    public function resizeImage(Request $request)
    {
        $image = $request->file;
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('images/'.$filename));
        return "Image has been resized";      
    }
}
