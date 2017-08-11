<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebDetail;
use App\FAQ;
use App\Category;
use App\Price;
use App\Transaction;
use App\TransactionDetail;
use App\Coupon;
use App\FFoTM;
use App\Base;
use App\Strap;
use App\Tattoo;
use Dvlpp\Merx\Models\Order;
use App\Slider;
use App\User;
class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::leftJoin('users', 'merx_orders.client_id', '=', 'users.id')
            ->select('merx_orders.*', 'users.name as user_name', 'users.phone as user_phone', 'users.email as user_email')
            ->where('merx_orders.state', '<>', 'draft')
            ->orderBy('merx_orders.created_at', 'desc')
            ->get();
        $webDetail = WebDetail::first();
        $FAQ = FAQ::first();
        $category = Category::get();
        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')->get();
        $slider = Slider::get();
        $transactionDetail = TransactionDetail::get();
        $coupon = Coupon::get();
        $ffotm = FFoTM::get();
        $price = Price::first();
        $base = Base::leftJoin('categories', 'categories.id', '=', 'bases.category_id')
            ->select('bases.*', 'categories.name as category')
            ->get();

        $strap = Strap::leftJoin('categories', 'categories.id', '=', 'straps.category_id')
            ->select('straps.*', 'categories.name as category')
            ->get();

        $tattoo = Tattoo::leftJoin('categories', 'categories.id', '=', 'tattoos.category_id')
            ->select('tattoos.*', 'categories.name as category')
            ->get();
        $users = User::where('role', '=', 'User')->get();
        return view('admin',compact('webDetail','FAQ','category','transaction','slider','transactionDetail','coupon','ffotm','base','strap','tattoo', 'orders', 'price', 'users'));
    }
}
