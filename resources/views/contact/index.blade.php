@extends('app')
@section('title', 'contact me')

@section('content')
    <div class="contact-page">
        <div class="contact-page__box">
            <img class="contact-page__image" src="{{ asset('img/placeholder.jpg') }}" alt="">
        </div>
        <div class="contact-page__box">
            <form class="contact-page__form" method="POST" action="{{ route('contact.send-email') }}">
                @csrf
                <h2 class="heading-lg">Write me a message</h2>

                <div class="form-group mt-4">
                    <label for="name" class="label">Name*</label>
                    <input type="text" name="name" class="input">
                </div>

                <div class="form-group">
                    <label for="email" class="label">Email*</label>
                    <input type="email" class="input" name="email">
                </div>

                <div class="form-group">
                    <label for="subject" class="label">Subject*</label>
                    <input type="email" class="input" name="subject">
                </div>

                <div class="form-group">
                    <label for="message" class="label">Message*</label>
                    <textarea name="message" class="textarea"></textarea>
                </div>

                <button class="mt-2 button-pink-100 ttu">Send</button>
            </form>
        </div>
    </div>
@endsection
