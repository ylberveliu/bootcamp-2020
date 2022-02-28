<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');

        if(isset($query) && !empty($query))
            $albums = Album::where('title', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();
        else
            $albums = Album::orderBy('id', 'DESC')->get();

        return view('albums.index')->with('albums', $albums);
    }

    public function create() {
        return view('albums.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:250',
        ]);

        if(Album::create($request->only('title'))) 
            return redirect()->route('albums.index')->with('success', 'Albumi u krijua me sukses');
        else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate shtimit te albumit ne bazen e te dhenave!');
    }

    public function show($id) {
        $album = Album::find($id);

        return view('albums.show')->with('album', $album);
    }

    public function edit($id) {
        $album = Album::find($id);
        return view('albums.edit')->with('album', $album);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:250',
        ]);

        $album = Album::find($id);

        if($album->update($request->only('title'))) 
            return redirect()->route('albums.index')->with('success', 'Albumi u azhurnua me sukses');
        else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate azhurnimit te detajeve te albumit!');
    }

    public function destroy($id) {
        $album = Album::find($id);

        if($album->delete())
            return redirect()->route('albums.index')->with('success', 'Albumi u fshi me sukses');
        else
            return redirect()->back()->with('error', 'Dicka shkoi keq pergjate fshirjes se albumit!');
    }
}
