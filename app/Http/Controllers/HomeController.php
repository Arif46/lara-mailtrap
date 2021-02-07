<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.home');
    }

    public function store(Request $r)
    {
        $inputs = [
            'name' => $r->input('name'),
            'email' => $r->input('email'),
            'subject' => $r->input('subject'),
            'bodyMessage' => $r->input('message'),
        ];
        
        Mail::send('emails.contact', $inputs, function ($mail) use ($inputs) {
            $mail->to($inputs['email'],$inputs['name'])
                 ->from('arifuzzamanarif42@gmail.com','Arif')   
                 ->subject("emailtest");
        });
        
        return redirect()->back()->with('message','We received Your e-mail.thank u contact with us');
    }
}
