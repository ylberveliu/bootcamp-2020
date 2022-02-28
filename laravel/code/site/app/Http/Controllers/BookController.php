<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'year' => 'required|numeric',
            'author' => 'required',
            'pages' => 'required|numeric|min:1',
        ]);
        
        $book = Book::create($request->except('_token'));

        $user = Auth::user();
        $user->books()->attach($book->id);


        if($book)
            return redirect()->route('books.index')->with('success', 'Book created succesfuly');
        else
            return redirect()->route('books.index')->with('success', 'Book was not created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:250',
            'year' => 'required|numeric',
            'author' => 'required',
            'pages' => 'required|numeric|min:1',
        ]);

        if(Book::find($id)->update($request->except('_token')))
            return redirect()->route('books.index')->with('success', 'Book updated succesfuly');
        else
            return redirect()->route('books.index')->with('success', 'Book was not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $user = Auth::user();

        $user->books()->detach($id);

        if($book->delete())
            return redirect()->route('books.index')->with('success', 'Book deleted succesfuly');
        else
            return redirect()->route('books.index')->with('success', 'Book was not deleted');
    }
}
