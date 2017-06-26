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

    public function getStock($baseID, $strapID, $size) {
        $stock = 0;
        $dummyBaseName = Base::find($baseID)->name;
        $baseWithSize = Base::where([
            ['name', '=', $dummyBaseName],
            ['size', '=', $size]
            ])->first();
        if($baseWithSize) {
            $stock = $baseWithSize->stock;
        }

        $dummyStrapName = Strap::find($strapID)->name;
        $convertedSize = 'S';
        if($size == 37 || $size == 38) {
            $convertedSize = 'M';
        }
        else if($size == 39 || $size == 40) {
            $convertedSize = 'L';
        }
        $strapWithSize = Strap::where([
            ['name', '=', $dummyStrapName],
            ['size', '=', $convertedSize]
            ])->first();
        if($strapWithSize) {
            $stock = min($stock, $strapWithSize->stock);
        }
        else $stock = 0;
        return response()->json([
                "success" => true,
                "data" => $stock
            ]);
    }
    public function getBaseWithSize($catID, $size) {
        $base = Base::where([
            ['category_id', '=', $catID],
            ['size', '=', $size],
            ['stock', '>', 0]
            ]
            )->get();
        return response()->json([
            'success' => true,
            'data' => $base
        ]);
    }

    public function getStrapWithSize($catID, $size) {
        $convertedSize = 'S';
        if($size == 37 || $size == 38) {
            $convertedSize = 'M';
        }
        else if($size == 39 || $size == 40) {
            $convertedSize = 'L';
        }
        $strap = Strap::where([
            ['category_id', '=', $catID],
            ['size', '=', $convertedSize],
            ['stock', '>', 0]
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

    public function removeCart($id) {
        Merx::cart()->removeItem($id);
        return back();
    }

    public function getService($cour, $dest) {
        $client = new Client();
        $costRequest = $client->request('POST', 'http://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => ['63eca030a065eac7a31580c94ff5c07e']
            ],
            'form_params' => [
                'origin' => "444",
                'destination' => $dest,
                'weight' => 1000,
                'courier' => $cour,

            ]
        ]);
        $responseBody = json_decode($costRequest->getBody()->getContents(), true);
        $costs = $responseBody['rajaongkir']['results'][0]['costs'];
        return response()->json([
            'success' => true,
            'data' => $costs
        ]);
    }

    public function finalizeOrder(Request $request) {
        Merx::cart()->setCustomAttribute("address", $request->address);
        Merx::order()->setCustomAttribute("service", $request->service);
        Merx::order()->setCustomAttribute("delivery_cost", $request->deliveryCost);
        Merx::order()->complete();
        return response()->json([
                'success' => true,
            ]);
    }
}