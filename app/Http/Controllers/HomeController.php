<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\BestSeller;
use App\FFoTM;
use App\Category;
use App\Base;
use App\Strap;
use GuzzleHttp\Client;
use Dvlpp\Merx\Facade\Merx;
use App\Price;

class HomeController extends Controller
{
    public function index() {
        $slider = Slider::get();
        $bestSeller = BestSeller::orderBy('quantity', 'desc')
            ->leftJoin('bases', 'bases.id', '=', 'best_sellers.base_id')
            ->leftJoin('straps', 'straps.id', '=', 'best_sellers.strap_id')
            ->select('best_sellers.*', 'bases.name as base_name', 'bases.picture as base_picture', 'straps.name as strap_name', 'straps.picture as strap_picture')
            ->get();
        $ffotm = FFoTM::leftJoin('bases', 'bases.id', '=', 'ffotms.base_id')
            ->leftJoin('straps', 'straps.id', '=', 'ffotms.strap_id')
            ->leftJoin('tattoos', 'tattoos.id', '=', 'ffotms.tattoo_id')
            ->select('ffotms.*', 'bases.name as base_name', 'bases.picture as base_picture', 'straps.picture as strap_picture', 'tattoos.picture as tattoo_picture', 'straps.name as strap_name','tattoos.name as tattoo_name')
            ->get();
        return view('index', compact('slider','bestSeller','ffotm'));
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
    public function makeYourOwn() {
        $category = Category::where('is_enabled','=', 1)->get();
        return view('makeyourown', compact('category'));
    }

    public function getBaseWithSize($catID, $size) {
        $base = Base::where([
            ['category_id', '=', $catID],
            ['size', '=', $size]
            ]
            )->get();
        return response()->json([
            'success' => true,
            'data' => $base
        ]);
    }

    public function getStrapWithSize($catID, $size) {
        $strap = Strap::where([
            ['category_id', '=', $catID],
            ['size', '=', $size]
            ]
            )->get();
        return response()->json([
            'success' => true,
            'data' => $strap
        ]);
    }

    public function checkout() {
        $cart = Merx::cart()->items;
        $total = Merx::cart()->total();
        return view('checkout', compact('cart', 'total'));
    }

    public function addtocart(Request $request) {
        $price = Price::first();
        $size = $request->size;
        $categoryID = $request->categoryID;
        $categoryName = Category::where('id', '=', $categoryID)->first()->name;
        $baseID = $request->baseID;
        $baseName = Base::where('id', '=', $baseID)->first()->name;
        $strapID = $request->strapID;
        $strapName = Strap::where('id', '=', $strapID)->first()->name;
        $quantity = $request->quantity;
        Merx::cart()->addItem([
            "article_id" => $baseID,
            "article_type" => \App\Base::class,
            "name" => $baseName,
            "details" => 'the blue one',
            "price" => $price->price,
            "quantity" => $quantity,
            "attributes" => [
                "category_id" => $categoryID,
                "category_name" => $categoryName,
                "size" => $size,
                "strap_id" => $strapID,
                "strap_name" => $strapName
            ]
        ]);
        return response()->json([
            'success' => true
            ]);
    }
}