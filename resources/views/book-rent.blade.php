@extends('layouts.mainLayout')

@section('title', 'Book-List')
    
@section('content')

{{-- {{$user}} --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h2 class="text-center mb-5">Peminjaman Buku</h2>

    @if (session('message'))
        <div class="alert {{session('alert-class')}} col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            {{ session('message') }}
        </div>
    @endif


    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form action="book-rent" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control select-box">
                    <option value="">Select one</option>
                    @foreach ($user as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Book</label>
                <select name="book_id" id="book" class="form-control select-box">
                    <option value="">Select one</option>
                    @foreach ($book as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-box').select2();
        });
    </script>
@endsection