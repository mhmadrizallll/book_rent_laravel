@extends('layouts.mainLayout')

@section('title', 'Categories')
    
@section('content')

    <div>
        <h1>Category List</h1>

        <div>
            <a href="category-add" class="btn btn-primary my-4">Add Category</a>
            <a href="category-deleted" class="btn btn-secondary ms-3">View category deleted</a>
        </div>

        @if(Session::has('status'))
            <p class="alert alert-info">{{ Session::get('status') }}</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <td class="bg bg-secondary text-white">No</td>
                    <td class="bg bg-secondary text-white">Nama</td>
                    <td class="bg bg-secondary text-white">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-capitalize">{{$item->name}}</td>
                        <td>
                            <a href="category-edit/{{$item->slug}}">Edit</a>
                            <a href="category-delete/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection