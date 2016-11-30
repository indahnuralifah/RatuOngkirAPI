<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getKota()
    {
    	return file_get_contents("http://api.rajaongkir.com/starter/city?key=f6bb451c050238bb85b5b768831266a4");
    }

    public function periksaOngkir(Request $r){
    	$jne = new \Curl\Curl();
    	$pos = new \Curl\Curl();
    	$tiki = new \Curl\Curl();

    	$origin = $r->input('kotaAsal');
    	$destination = $r->input('kotaTujuan');
    	$weight = $r->input('berat');

		$jne->post('http://api.rajaongkir.com/starter/cost', array(
		    'origin' => $origin,
		    'destination' => $destination,
		    'weight' => $weight,
		    'courier' => "jne",
		    'key' => 'f6bb451c050238bb85b5b768831266a4',
		));

		$pos->post('http://api.rajaongkir.com/starter/cost', array(
		    'origin' => $origin,
		    'destination' => $destination,
		    'weight' => $weight,
		    'courier' => "pos",
		    'key' => 'f6bb451c050238bb85b5b768831266a4',
		));

		$tiki->post('http://api.rajaongkir.com/starter/cost', array(
		    'origin' => $origin,
		    'destination' => $destination,
		    'weight' => $weight,
		    'courier' => "tiki",
		    'key' => 'f6bb451c050238bb85b5b768831266a4',
		));

		if ($jne->error || $pos->error || $tiki->error) {
		    echo $jne->error_code."<br/>";
		    echo $pos->error_code."<br/>";
		    echo $tiki->error_code."<br/>";
		}
		else {
	    	return view('periksaongkir')->with([
	    		'jne' => $jne->response,
	    		'pos' => $pos->response,
	    		'tiki' => $tiki->response
	    	]);
		}
    }
}
