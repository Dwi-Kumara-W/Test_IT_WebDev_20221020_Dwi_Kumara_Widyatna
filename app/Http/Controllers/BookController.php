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
        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_link' => $request->image_link,
            'book_links' => $request->book_links,
            'file' => 'data_file/'.$nama_file,
        ]);

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
