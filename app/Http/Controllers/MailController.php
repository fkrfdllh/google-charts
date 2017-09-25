<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index() {
    	$date = date('l F Y');

    	return view('mail.mail')->with('date', $date);
    }

    public function send() {
    	$data = array('email' => 'ariefsetya@live.com', 
    					'first_name' => 'Laporan Trafik Perusahaan X', 
        				'from' => 'fkrfdllh@gmail.com',
        				'from_name' => 'Fikri');

    	Mail::send('mail.mail', $data, function ($message) use ($data) {
    		$message->to($data['email'])
    		->from($data['from'], $data['from_name'])
    		->subject($data['first_name']);
    	});

    	return "Email sent";
    }
}
