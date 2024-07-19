<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $author;

     public function __construct(Author $author)
     {
         $this->author = $author;
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_authors = $this->author->all();
        return view('authors.create')->with('all_authors',$all_authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->author->name = $request->author_name;

        $this->author->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
        return view('authors.delete')->with('author',$author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
        return view('authors.edit')->with('author',$author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //

        $author->name = $request->author_name;
        $author->save();

        return redirect()->route('authors.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return redirect()->route('authors.create');
    }
}
