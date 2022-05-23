@extends('app')
@section('extra-links')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Login')
@section('content')
    <div class="container" style="width: 37rem;">
        <h1 class="pt-8 ttu ">Login</h1>
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="form-group">
                <label class="label" for="exampleInputEmail1">Email address</label>
                <input value="{{ old('email') }}" name="email" type="email" class="input" id="exampleInputEmail1">
                @error('email')
                    <p class="validation-error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label  class="label" for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="input" id="exampleInputPassword1">
                @error('password')
                    <p class="validation-error">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="mt-2 button-pink-100 ttu">Login</button>
        </form>
    </div>
@endsection
