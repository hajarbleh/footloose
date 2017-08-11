<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Slider;
use App\BestSeller;
use App\FFoTM;
use App\Category;
use App\Base;
use App\Strap;
use GuzzleHttp\Client;
use Dvlpp\Merx\Facade\Merx;
use Dvlpp\Merx\Models\Order;
use App\Price;
use Carbon\Carbon;
use App\Coupon;

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
            ->leftJoin('categories', 'categories.id', '=', 'ffotms.category_id')
            ->select('ffotms.*', 'categories.name as category_name','bases.name as base_name', 'bases.picture as base_picture', 'straps.picture as strap_picture', 'tattoos.picture as tattoo_picture', 'straps.name as strap_name','tattoos.name as tattoo_name')
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
        $itemCount = Merx::cart()->itemsCount();
        $total = Merx::cart()->total();
        if(session()->has('coupon')) {
            $total = $total*(100-session()->get('coupon')->discount)/100;
        }
        return view('checkout', compact('cart', 'total', 'itemCount'));
    }

    public function addtocart(Request $request) {
        $price = Price::first();
        $size = $request->size;
        $categoryID = $request->categoryID;
        $categoryName = Category::where('id', '=', $categoryID)->first()->name;
        $baseID = $request->baseID;
        $baseName = Base::where('id', '=', $baseID)->first()->name;
        $basePicture = Base::where('id', '=', $baseID)->first()->picture;
        $strapID = $request->strapID;
        $strapName = Strap::where('id', '=', $strapID)->first()->name;
        $strapPicture = Strap::where('id', '=', $strapID)->first()->picture;
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
                "base_picture" => $basePicture,
                "strap_id" => $strapID,
                "strap_name" => $strapName,
                "strap_picture" => $strapPicture
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



    public function getService($cour, $dest, $itemcount) {
        if($itemcount) {
            $client = new Client();
            $costRequest = $client->request('POST', 'http://api.rajaongkir.com/starter/cost', [
                'headers' => [
                    'key' => ['63eca030a065eac7a31580c94ff5c07e']
                ],
                'form_params' => [
                    'origin' => "455",
                    'destination' => $dest,
                    'weight' => 500*$itemcount,
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
        return response()->json(['error' => "Cart is empty"], 400);
    }

    public function finalizeOrder(Request $request) {
        if(Merx::cart()->itemsCount()) {
            try {
                DB::transaction(function() {
                    $items = Merx::cart()->items;
                    foreach($items as $item) {
                        $base = Base::find($item->article_id);
                        $baseStock = $base->stock;
                        $strap = Strap::find($item->custom_attributes['strap_id']);
                        $strapStock = $strap->stock;
                        if($item->quantity > $baseStock || $item->quantity > $strapStock) {
                            $baseName = Base::find($item->article_id)->name;
                            $strapName = $item->custom_attributes['strap_name'];
                            throw new \Exception("Not enough stock for item " . $baseName . " with " . $strapName);
                        }
                        $base->stock = $base->stock - $item->quantity;
                        $base->save();
                        $strap->stock = $strap->stock - $item->quantity;
                        $strap->save();
                    }
                });
            }
            catch(\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
            Merx::newOrderFromCart();
            if(session()->has('coupon')) {
                $isCouponUsed = DB::table('merx_orders')
                    ->where("client_id", "=", Auth::user()->id)
                    ->where("custom_attributes", "like", "%\"coupon\":\"".session()->get('coupon')->code."\"%")
                    ->count();
                $timeNow = Carbon::now();
                $selectedCoupon = Coupon::where('code', '=', session()->get('coupon')->code)
                                ->where('start_date', '<', $timeNow)
                                ->where('expired_date', '>', $timeNow)
                                ->first();
                if($isCouponUsed == 0 && $selectedCoupon) {
                    Merx::order()->setMultipleCustomAttributes([
                            "address" => $request->address,
                            "service" => $request->service,
                            "delivery_cost" => $request->deliveryCost,
                            "total" => $request->total,
                            "coupon" => session()->get('coupon')->code
                        ]);
                }
                else {
                    return response()->json(['error' => "Your coupon is not valid"], 400);
                }
            }
            else {
                Merx::order()->setMultipleCustomAttributes([
                        "address" => $request->address,
                        "service" => $request->service,
                        "delivery_cost" => $request->deliveryCost,
                        "total" => $request->total
                    ]);
            }
            Merx::completeOrder();
            return response()->json([
                    'success' => true
                ]);
        }
        else {
            return response()->json(['error' => "Pastikan anda sudah memesan."], 400);
        }
    }

    public function useCoupon(Request $request) {
        $isCouponUsed = DB::table('merx_orders')
                    ->where("client_id", "=", Auth::user()->id)
                    ->where("custom_attributes", "like", "%\"coupon\":\"".$request->coupon."\"%")
                    ->count();
        $timeNow = Carbon::now();
        $selectedCoupon = Coupon::where('code', '=', $request->coupon)
                        ->where('start_date', '<', $timeNow)
                        ->where('expired_date', '>', $timeNow)
                        ->first();
        if($isCouponUsed == 0 && $selectedCoupon) {
            session(['coupon' => $selectedCoupon]);
            return back();
        }
        else {
            session()->forget('coupon');
            session()->flash('message', "Coupon is not valid");
            return back();
        }
    }
}