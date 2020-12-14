<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    public function dZone()
    {
        return view('dropzone');
    }

    public function dzoneStore(Request $request)
    {
        $image = $request->file('file');
        $image_name = time().'.'.$image->extension();
        $image->move(public_path('images'), $image_name);
        return response()->json(['success' => $image_name]);
    }
}
