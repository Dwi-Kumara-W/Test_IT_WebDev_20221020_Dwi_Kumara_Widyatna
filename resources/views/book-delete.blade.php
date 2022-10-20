@extends('layouts.mainlayout')
@section('title', 'Book')

@section('content')

    <div class="mt-5">
        <h2>Are you sure to delete data : {{ $book->title }}</h2>

        <form style="display: inline-block" action="/book-destroy/{{ $book->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>

@endsection
