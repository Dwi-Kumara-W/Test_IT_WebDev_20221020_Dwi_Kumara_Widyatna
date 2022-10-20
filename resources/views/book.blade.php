@extends('layouts.mainlayout')
@section('title', 'Books')

@section('content')
    <h1>Ini Halaman Master Books</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="book-add" class="btn btn-primary">Add Data</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Book List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="keyword">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>
                        <a href="book-delete/{{ $book->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->withQueryString()->links() }}
@endsection
