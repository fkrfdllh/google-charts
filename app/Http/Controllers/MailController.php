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

    public function send(Request $r) {
        // return "wakwkakw";
        // $base64 = $r->input('base64');
        // $base64_str = substr($base64, strpos($base64, ",")+1);
        // $image = base64_decode($base64_str);
        // file_put_contents(url('images/testing.jpg'), $image);
        $response = [];
        $response['base64'] = $r->all();
        return response()->json($response);


        $data = array('email' => 'fkrfdllh@gmail.com', 
                        'first_name' => 'Laporan Trafik Perusahaan X', 
                        'from' => 'fkrfdllh@gmail.com',
                        'from_name' => 'Fikri');

        Mail::send('mail.mail', ['base64' => $r->input('base64')], function ($message) use ($data) {
            $message->to($data['email'])
            ->from($data['from'], $data['from_name'])
            ->subject($data['first_name']);
        });

        return $data;
    }
}
