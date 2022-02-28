<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class ImageController extends Controller
{
    public function create($id) {
        $album = Album::find($id);
        return view('images.create')->with('album', $album);
    }

    public function store(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:250',
            'image' => 'required',
        ]);
        
        $filename = time() ."." .$request->image->extension();

        $image = new Image;
        $image->title = $request->title;
        $image->image = $filename;
        $image->album_id = $id;


        if($image->save()) {
            # upload image
            $request->image->move(public_path('uploads'), $filename);
            return redirect()->route('albums.show', ['album' => $image->album->id])->with('success', 'Imazhi u krijua me sukses');
        } else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate shtimit te imazhit ne bazen e te dhenave!');
    }

    public function edit($id) {
        $image = Image::find($id);
        return view('images.edit')->with('image', $image);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:250',
            'image' => 'required',
        ]);
        
        $filename = time() ."." .$request->image->extension();


        $image = Image::find($id);
        $image->title = $request->title;
        $image->image = $filename;

        if($image->save()) {
            # upload image
            $request->image->move(public_path('uploads'), $filename);

            return redirect()->route('albums.show', ['album' => $image->album->id])->with('success', 'Imazhi u azhurnua me sukses');
        } else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate azhrnimit te imazhit!');
    }

    public function destroy($id) {
        $image = Image::find($id);

        if($image->delete()) {
            //unlink(public_path('uploads', $image->image));
            return redirect()->route('albums.index')->with('success', 'Imazhi u fshi me sukses');
        } else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate fshirjes se imazhit!');
    }
}
