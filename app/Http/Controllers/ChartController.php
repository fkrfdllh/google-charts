<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use DB;
use Mail;

class ChartController extends Controller
{
    public function index($month = null) {
    	if ($month) {
			$user_agent = Logs::select('user_agent')
                        ->orderBy('created_at', '=', $month)
                        ->groupBy('user_agent')
                        ->get();

	        foreach ($user_agent as $key => $value) {
	            $value->total = count(Logs::where('user_agent', $value->user_agent)->get());
	        }

	        $result[] = ['User Agent', 'Total'];

	        foreach ($user_agent as $key => $value) {
	            $result[++$key] = [
	                $value->user_agent,
	                $value->total
	            ];
	        }

	        $url = Logs::select('url')
	        ->orderBy('created_at', '=', $month)
	        ->groupBy('url')
	        ->get();

	        foreach ($url as $key => $value) {
	        	$value->total = count(Logs::where('url', $value->url)->get());
	        }

	        $result2[] = ['URL', 'Total'];

	        foreach ($url as $key => $value) {
	        	$result2[++$key] = [
	        		$value->url,
	        		$value->total
	        	];
	        }

	        $http_host = Logs::select('http_host')
	        ->orderBy('created_at', '=', $month)
	        ->groupBy('http_host')
	        ->get();

	        foreach ($http_host as $key => $value) {
	        	$value->total = count(Logs::where('http_host', $value->http_host)->get());
	        }

	        $result3[] = ['HTTP Host', 'Total'];

	        foreach ($http_host as $key => $value) {
	        	$result3[++$key] = [
	        		$value->http_host,
	        		$value->total
	        	];
	        }    		
    	} else {
	        $user_agent = Logs::select('user_agent')
	                        ->orderBy('user_agent', 'ASC')
	                        ->groupBy('user_agent')
	                        ->get();

	        foreach ($user_agent as $key => $value) {
	            $value->total = count(Logs::where('user_agent', $value->user_agent)->get());
	        }

	        $result[] = ['User Agent', 'Total'];

	        foreach ($user_agent as $key => $value) {
	            $result[++$key] = [
	                $value->user_agent,
	                $value->total
	            ];
	        }

	        $url = Logs::select('url')
	        ->orderBy('url', 'ASC')
	        ->groupBy('url')
	        ->get();

	        foreach ($url as $key => $value) {
	        	$value->total = count(Logs::where('url', $value->url)->get());
	        }

	        $result2[] = ['URL', 'Total'];

	        foreach ($url as $key => $value) {
	        	$result2[++$key] = [
	        		$value->url,
	        		$value->total
	        	];
	        }

	        $http_host = Logs::select('http_host')
	        ->orderBy('http_host', 'ASC')
	        ->groupBy('http_host')
	        ->get();

	        foreach ($http_host as $key => $value) {
	        	$value->total = count(Logs::where('http_host', $value->http_host)->get());
	        }

	        $result3[] = ['HTTP Host', 'Total'];

	        foreach ($http_host as $key => $value) {
	        	$result3[++$key] = [
	        		$value->http_host,
	        		$value->total
	        	];
	        }
    	}

        // $user_agent = Logs::select('user_agent')
        //                 ->orderBy('user_agent', 'ASC')
        //                 ->groupBy('user_agent')
        //                 ->get();

        // foreach ($user_agent as $key => $value) {
        //     $value->total = count `(Logs::where('user_agent', $value->user_agent)->get());
        // }

        // $result[] = ['User Agent', 'Total'];

        // foreach ($user_agent as $key => $value) {
        //     $result[++$key] = [
        //         $value->user_agent,
        //         $value->total
        //     ];
        // }

        // $url = Logs::select('url')
        // ->orderBy('url', 'ASC')
        // ->groupBy('url')
        // ->get();

        // foreach ($url as $key => $value) {
        // 	$value->total = count(Logs::where('url', $value->url)->get());
        // }

        // $result2[] = ['URL', 'Total'];

        // foreach ($url as $key => $value) {
        // 	$result2[++$key] = [
        // 		$value->url,
        // 		$value->total
        // 	];
        // }

        // $http_host = Logs::select('http_host')
        // ->orderBy('http_host', 'ASC')
        // ->groupBy('http_host')
        // ->get();

        // foreach ($http_host as $key => $value) {
        // 	$value->total = count(Logs::where('http_host', $value->http_host)->get());
        // }

        // $result3[] = ['HTTP Host', 'Total'];

        // foreach ($http_host as $key => $value) {
        // 	$result3[++$key] = [
        // 		$value->http_host,
        // 		$value->total
        // 	];
        // }

        return view('welcome')->with('user_agent', json_encode($result))->with('url', json_encode($result2))->with('http_host', json_encode($result3))->with('month', $month);
    }

    public function send() {
    	// $renderedData = view('welcome')->render();
    	// $data = array('email' => 'fkrfdllh@gmail.com', 'first_name' => 'Test', 
     //    'from' => 'fkrfdllh@gmail.com', 'from_name' => 'Fikri');

    	// Mail::send('welcome', $data, function($message) use($data) {
    	// 	$message->to($data['email'])
    	// 	->from($data['form'], $data['from_name'])
    	// 	->subject($data['first_name'])
    	// 	->attactData($renderedData, 'welcome.blade.php');
    	// });

    	// return view('welcome')->with('renderedData', $renderedData)->with('data', $data);
    }
}
