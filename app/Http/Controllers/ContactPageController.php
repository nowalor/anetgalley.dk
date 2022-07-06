<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactPageSendEmailRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendEmail(ContactPageSendEmailRequest $request)
    {
        $validated = $request->validated();

        echo env('MAIL_TO_ADDRESS');

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($validated));
    }
}
