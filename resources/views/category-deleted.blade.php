@extends('layouts.mainLayout')

@section('title', 'Categories-Edit')
    
@section('content')

    <h2 class="mb-4">Daftar Category yang terhapus</h2>

    
    <table class="table">
        <thead>
            <tr>
                <td class="bg bg-secondary text-white">No</td>
                <td class="bg bg-secondary text-white">Name</td>
                <td class="bg bg-secondary text-white">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryDeleted as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td><a href="/category-restore/{{$item->slug}}">restore</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection