@extends('app')
@section('extra-links')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Login')
@section('content')

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <div class="container" style="width: 37rem;">
        <h1 class="pt-8 ttu ">Login</h1>
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mt-2">
                <label class="label" for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="input" id="exampleInputEmail1">
            </div>
            <div class="mt-2">
                <label  class="label" for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="input" id="exampleInputPassword1">
            </div>

            <button type="submit" class="mt-2 button-pink-100 ttu">Login</button>
        </form>
    </div>
@endsection
