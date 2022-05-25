<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactPageSendEmailRequest;

class ContactPageController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendEmail(ContactPageSendEmailRequest $request)
    {
        $validated = $request->validated;

        var_dump($request);
    }
}
