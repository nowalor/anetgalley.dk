@extends('app')

@section('title', 'Admin')
@section('content')
    <div class="container pt-2">
        <h1 class="heading-lg">Welcome, {{ auth()->user()->name }}</h1>
        <h2 class="heading-md">This is your admin pannel</h2>
    </div>
@endsection

