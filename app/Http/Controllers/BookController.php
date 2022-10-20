<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{

    public function index(Request $request){
        $keyword = $request->keyword;

        $book = Book::where('title', 'LIKE', '%'.$keyword.'%')
                    ->paginate(10);

        return view('home', ['books' =>$book]);

    }

    public function indexmaster(Request $request){
        $keyword = $request->keyword;

        $book = Book::where('title', 'LIKE', '%'.$keyword.'%')
                    ->paginate(10);

        return view('book', ['books' =>$book]);

    }

    public function create()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {


        $book = Book::create($request->all());

        if($book){
            Session::flash('status', 'success');
            Session::flash('message', 'add new book success!');
        }

        return redirect('/book');

    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        return view('book-delete', ['book' => $book]);
    }

    public function destroy($id)
    {
        $deleteBook = Book::findOrFail($id);
        $deleteBook->delete();

        if($deleteBook){
            Session::flash('status', 'success');
            Session::flash('message', 'delete book success!');
        }

        return redirect('/book');
    }

}
