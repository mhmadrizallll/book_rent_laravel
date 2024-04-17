@extends('layouts.mainLayout')

@section('title', 'User-Register')
    
@section('content')

    <h2>Users Registered Approve</h2>

    <div class="my-3">
        @if ($user->status == 'active')
            
        @else
            <a href="/user-approve/{{$user->slug}}" class="btn btn-primary">Approve user</a>
            <a href="/user-registered" class="btn btn-primary">Back users</a>                        
        @endif
    </div>

    @if(Session::has('status'))
        <p class="alert alert-info">{{ Session::get('status') }}</p>
    @endif

    <div class="w-50">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" readonly value="{{$user->name}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" readonly value="{{$user->phone}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control" style="resize: none" readonly>{{$user->address}}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            <input type="text" readonly class="form-control" value="{{$user->status}}">
        </div>

        @if ($user->status == 'active')
            <a href="/users" class="btn btn-primary">Back users</a>            
        @endif
    </div>

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rentLog' />
    </div>

@endsection