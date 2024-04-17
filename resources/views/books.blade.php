@extends('layouts.mainLayout')

@section('title', 'Books')
    
@section('content')
    
    <h2>Books List</h2>

    <div>
        <a href="book-add" class="btn btn-primary my-3">Add Book</a>
        <a href="book-deleted" class="btn btn-secondary ms-3">View books deleted</a>
    </div>

    @if(Session::has('status'))
        <p class="alert alert-info">{{ Session::get('status') }}</p>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td class="bg bg-secondary text-white">No</td>
                    <td class="bg bg-secondary text-white">Code</td>
                    <td class="bg bg-secondary text-white">Title</td>
                    <td class="bg bg-secondary text-white">Category</td>
                    <td class="bg bg-secondary text-white">Status</td>
                    <td class="bg bg-secondary text-white">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                - {{$category->name}} <br>
                            @endforeach
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="book-edit/{{$item->slug}}">Edit</a>
                            <a href="book-delete/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection