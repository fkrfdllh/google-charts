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
        $file_data = $r->input('base64'); 
        $file_name = 'image_'.time().'.png'; //generating unique file name; 
        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data); 
        if($file_data!=""){ // storing image in storage/app/public Folder 
            $data = array('email' => 'heggies0iqbal@gmail.com', 
                            'first_name' => 'Laporan Trafik Perusahaan X', 
                            'from' => 'fkrfdllh@gmail.com',
                            'from_name' => 'Fikri');

            Mail::send('mail.mail', ['base64' => $file_data], function ($message) use ($data) {
                $message->to($data['email'])
                ->from($data['from'], $data['from_name'])
                ->subject($data['first_name']);
            });
        }

        $response = [];
        $response['message'] = "success";
        return response()->json($response);
    }
}
