<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $book;

    public function __construct(Book $book){
        $this->book = $book;
    }
    public function index()
    {
        //
        $authorsCount = Author::count();
        $booksCount = Book::count();
        return view('books.index')
        ->with('authorsCount',$authorsCount)
        ->with('booksCount',$booksCount);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $all_authors = Author::all();
        $all_books = $this->book->all();
        return view('books.create')
        ->with('all_authors',$all_authors)
        ->with('all_books',$all_books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'title' => 'string|max:255',
            'year' => 'integer',
            'author' => 'nullable|exists:authors,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:1048',
        ]);


    $this->book->title = $request->title;
    $this->book->year_published = $request->year;
    $this->book->image = $this->saveImage($request);
    $this->book->author_id = $request->author ?: null;
    $this->book->save();

    return redirect()->back();
    }

    public function saveImage($request)
    {
        // rename the  file
        $image_name = time() . "." . $request->image->extension();
        #1718958733.jpeg
        // where to upload the file
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $all_authors = Author::all();
        return view('books.edit')
        ->with('all_authors',$all_authors)
        ->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //

        $request->validate([
            'title' => 'string|max:255',
            'year' => 'integer',
            'author' => 'nullable|exists:authors,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        $book->title = $request->title;
        $book->year_published = $request->year;
        $book->author_id = $request->author ?: null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // 既存の画像を削除
            $this->deleteImage($book);
    
            // 新しい画像を保存
            $book->image = $this->saveImage($request);
        }
        
        $book->save();
    
        return redirect()->route('books.create');
    }

    public function deleteImage($book){
        $image_path = self::LOCAL_STORAGE_FOLDER.$book->image;

        if(Storage::exists($image_path)){
            Storage::delete($image_path);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('books.create');
    }
    public function destroy_confirm(Book $book)
    {
        //
        return view('books.delete')->with('book',$book);
    }





public function showFavorites(Book $book)
{

    $favorites = auth()->user()->favorites()
                         ->with('book')
                         ->get();

    return view('favorites.index')
    ->with('favorites',$favorites);
}

public function favorite(Book $book)
{
    $user = auth()->user();

    // ユーザーがすでにお気に入りに登録しているかを確認
    $favorite = Favorite::where('user_id', $user->id)
                        ->where('book_id', $book->id)
                        ->first();

    if ($favorite) {
        $favorite->delete();
        return redirect()->back();
    } else {
        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->book_id = $book->id;
        $favorite->save();
        return redirect()->back();
    }

}



}
