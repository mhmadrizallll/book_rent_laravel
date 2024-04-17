@extends('layouts.mainLayout')

@section('title', 'Users')
    
@section('content')

    <h2>Users List</h2>

    <div class="my-3">
        <a href="/user-registered" class="btn btn-primary">New Registered Users</a>
        <a href="/user-banned" class="btn btn-secondary">View users ban</a>
    </div>

    @if(Session::has('status'))
        <p class="alert alert-info">{{ Session::get('status') }}</p>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <td class="bg bg-success text-white">No</td>
                <td class="bg bg-success text-white">Username</td>
                <td class="bg bg-success text-white">Phone</td>
                <td class="bg bg-success text-white">Status</td>
                <td class="bg bg-success text-white">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    @if ($item->phone == null)
                        <td>-</td>
                    @else
                        <td>{{$item->phone}}</td>
                    @endif
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="/user-register/{{$item->slug}}">detail</a>
                        <a href="/user-ban/{{$item->slug}}">banned</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection