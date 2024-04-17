@extends('layouts.mainLayout')

@section('title', 'Categories-Edit')
    
@section('content')

    <div class="w-50">
        <h2 class="mb-4">Category Edit</h2>

        <form action="/category-edit/{{$category->slug}}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{$category->name}}" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Edit category</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection