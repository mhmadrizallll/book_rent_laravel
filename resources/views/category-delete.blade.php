@extends('layouts.mainLayout')

@section('title', 'Categories-Delete')
    
@section('content')

    <div>
        <h2>Anda berada pada halaman category, {{$category->name}}</h2>
        <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger">Delete</a>
        <a href="/categories" class="btn btn-primary">Cancel</a>
    </div>


@endsection