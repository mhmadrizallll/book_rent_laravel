@extends('layouts.mainLayout')

@section('title', 'Categories-Add')
    
@section('content')

    <div class="w-50">
        <h2 class="mb-4">Category Add</h2>

        <form action="category-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add category</button>
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