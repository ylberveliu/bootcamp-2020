<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    protected $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    public function index() {
        return view('upload.index');
    }

    public function upload(Request $request) {
        $ext = $request->image->extension();
        
        if(!in_array($ext, $this->allowed_extensions)) 
            return redirect()->route('upload-image-form')->with('error', 'Image format is invalid! Allowed formats: '.implode(", ", $this->allowed_extensions));

        $filename = time() .'.' .$ext;
        $request->file('image')->storeAs('uploads', $filename, 'public');
        return redirect()->route('upload-image-form')->with(['success' => 'Image was uploaded successfully.', 'filename' => $filename]);
        
        // $filename = time() .'.' .$ext;
        // $request->image->move(public_path('uploads'), $filename);
        // return redirect()->route('upload-image-form')
        //                  ->with(['success' => 'Image was uploaded successfully.', 'filename' => $filename]);
    }
}
