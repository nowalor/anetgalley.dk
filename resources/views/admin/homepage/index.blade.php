@extends('app')
@section('title', 'Edit homepage')
@section('content')
    <div class="container">
        <form action=" {{ route('admin.homepage.update', $homepageInformation) }} "></form>
    </div>
@endsection
