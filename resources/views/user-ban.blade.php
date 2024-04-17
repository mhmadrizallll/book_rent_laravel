@extends('layouts.mainLayout')

@section('title', 'User-Ban')
    
@section('content')

    <div>
        <h2>Anda berada pada halaman user, {{$user->name}}</h2>
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger">Delete</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>


@endsection