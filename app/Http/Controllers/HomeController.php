<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;

class HomeController extends Controller
{
    public function home($value='')
    {
    	return view('welcome');
    }
    public function YourhomePage($value='')
    {
    	return view('home');
    }
    public function dashboard($value='')
    {
    	return view('backEnd.dashboard');
    }

    public function mail()
    {
        $user = User::find(1)->toArray();
        Mail::send('email', $user, function($message) use ($user) {
            $message->to('jorge.j.gonzalez.93@gmail.com');
            $message->subject('Mailgun Testing');
        });
        dd('Mail Send Successfully');
    }
}
