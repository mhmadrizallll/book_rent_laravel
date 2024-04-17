@extends('layouts.mainLayout')

@section('title', 'Book-List')
    
@section('content')

{{-- {{$book}} --}}
    <h2>Book List</h2>

    <form action="" method="get">
        <div class="d-flex gap-2">
            <div class="w-50">
                <select name="keyword_category" id="" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-50">
                <input type="text" placeholder="input your book" class="form-control" name="keyword_title">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="mt-3">
        <div class="row">
            @foreach ($book as $item)
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <div class="card h-100">
                        <img src="{{asset('storage/cover/'.$item->image)}}" class="card-img-top">
                        <div class="card-body">
                        <h5 class="card-title">{{$item->book_code}}</h5>
                        <p class="card-text">{{$item->title}}</p>
                        
                        <p class="card-text text-end fw-bold
                            @if ($item->status == 'not available')
                                text-danger
                            @else
                                text-success
                            @endif
                        ">{{$item->status}}</p>
                        </div>
                    </div>
                </div>                
            @endforeach
        </div>
    </div>

@endsection