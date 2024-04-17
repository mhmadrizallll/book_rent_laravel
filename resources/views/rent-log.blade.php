@extends('layouts.mainLayout')

@section('title', 'Rent Logs')
    
@section('content')
    
    <h2>List Rent Logs</h2>
{{-- {{$rentLog}} --}}
    <div class="mt-5">
        <x-rent-log-table :rentlog='$rentLog' />
    </div>

@endsection