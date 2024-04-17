@extends('layouts.mainLayout')

@section('title', 'Book-Delete')
    
@section('content')

    <div>
        <h2>Anda berada pada halaman book, <span class="text-capitalize">{{$book->title}}</span></h2>
        <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger">Delete</a>
        <a href="/books" class="btn btn-primary">Cancel</a>
    </div>


@endsection