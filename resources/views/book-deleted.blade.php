@extends('layouts.mainLayout')

@section('title', 'Book-Deleted')
    
@section('content')
    
    <h2>Books Deleted List</h2>


    <div>
        <table class="table">
            <thead>
                <tr>
                    <td class="bg bg-secondary text-white">No</td>
                    <td class="bg bg-secondary text-white">Code</td>
                    <td class="bg bg-secondary text-white">Title</td>
                    <td class="bg bg-secondary text-white">Category</td>
                    <td class="bg bg-secondary text-white">Status</td>
                    <td class="bg bg-secondary text-white">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                - {{$category->name}} <br>
                            @endforeach
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="book-restore/{{$item->slug}}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection