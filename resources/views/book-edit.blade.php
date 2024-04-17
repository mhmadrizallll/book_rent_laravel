@extends('layouts.mainLayout')

@section('title', 'Book-Edit')
    
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- {{$category}} --}}
    <div class="w-50">
        <h2 class="mb-4">Edit Book</h2>

        <form action="/book-edit/{{$book->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="code" class="form-label">Book Code</label>
                <input type="text" name="book_code" id="code" class="form-control" autocomplete="off" value="{{$book->book_code}}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book Name" value="{{$book->title}}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label><br>
                <img src="
                @if ($book->image != '')
                    {{asset('storage/cover/'.$book->image)}}
                @else
                    {{asset('image/ikmi-logo.png')}}
                @endif
                "
                 alt="" width="200">
                <input type="file" name="photo" id="photo" class="form-control mt-3">
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Category</label>
                <select name="categories[]" id="categories" class="form-control select-multiple" multiple>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <ul class="mt-2">
                    @foreach ($book->categories as $item)
                        <li>{{$item->name}}</li>
                    @endforeach
                </ul>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Edit Book</button>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection