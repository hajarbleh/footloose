<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\BestSeller;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index() {
        $slider = Slider::get();
        $bestSeller = BestSeller::orderBy('quantity', 'desc')
            ->leftJoin('bases', 'bases.id', '=', 'best_sellers.base_id')
            ->leftJoin('straps', 'straps.id', '=', 'best_sellers.strap_id')
            ->select('best_sellers.*', 'bases.name as base_name', 'straps.name as strap_name')
            ->get();
        return view('index', compact('slider','bestSeller'));
    }
    
    public function getCity($id) {
        $client = new Client();
        $city = $client->request('GET', 'http://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => ['63eca030a065eac7a31580c94ff5c07e']
            ],
            'query' => ['province' => $id]
        ]);
        $responseBody = json_decode($city->getBody()->getContents(), true);
        $cities = $responseBody['rajaongkir']['results'];
        return response()->json([
            'success' => true,
            'data' => $cities,
        ]);
    }
}
