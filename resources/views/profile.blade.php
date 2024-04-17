@extends('layouts.mainLayout')

@section('title', 'Profile')
    
@section('content')
<h2>Halaman user profile list</h2>

<div class="mt-5">
    <x-rent-log-table :rentlog='$rentLog' />
</div>
@endsection