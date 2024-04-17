@extends('layouts.mainLayout')

@section('title', 'Dashboard')
    
@section('content')

    <div class="row">
        <h1 class="mb-4">Welcome, {{Auth::user()->name}}</h1>

        <div class="col-4">
            <div class="card-data books">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{$book_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list"></i></div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-desc">Category</div>
                        <div class="card-count">{{$category_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-data users">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people-fill"></i></div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{$user_count}}</div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="mt-5">
        <h2>Rent Log</h2>

        <table class="table mt-3">
            <thead>
                <tr>
                    <td class="bg bg-secondary text-white">No</td>
                    <td class="bg bg-secondary text-white">User</td>
                    <td class="bg bg-secondary text-white">Book Title</td>
                    <td class="bg bg-secondary text-white">Rent Date</td>
                    <td class="bg bg-secondary text-white">Return Date</td>
                    <td class="bg bg-secondary text-white">Actual Return Date</td>
                    <td class="bg bg-secondary text-white">Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection