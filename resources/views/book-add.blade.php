@extends('layouts.mainlayout')
@section('title', 'Book | Add New')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="book" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" required>
            </div>

            <div class="mb-3">
                <label for="image_link">Image Link</label>
                <input type="text" class="form-control" name="image_link" id="image_link" required>
            </div>

            <div class="mb-3">
                <label for="book_links">Book Link</label>
                <input type="text" class="form-control" name="book_links" id="book_links" required>
            </div>

            <div class="mb-3">
                <b>File Gambar</b><br/>
                <input type="file" name="file">
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>

    </div>
@endsection
