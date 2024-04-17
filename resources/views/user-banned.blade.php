@extends('layouts.mainLayout')

@section('title', 'Users')
    
@section('content')

    <h2>Users Banned List</h2>

    <div class="my-3">
        <a href="/users" class="btn btn-primary">Back users</a>
    </div>
    
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
                        <a href="/user-restore/{{$item->slug}}">restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection