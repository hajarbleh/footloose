<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebDetail;
use App\FAQ;
use App\Category;
use App\Transaction;
use App\TransactionDetail;
use App\Coupon;
use App\FFoTM;
use App\Base;
use App\Strap;
use App\Tattoo;

class AdminController extends Controller
{
    public function index()
    {
        $webDetail = WebDetail::first();
        $FAQ = FAQ::first();
        $category = Category::get();
        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')->get();
//        $buyer = DB::table('posts')
//             ->leftJoin(DB::raw("(SELECT count(user_id) as likers, post_id from likes GROUP BY post_id) hehe"), 'posts.id', '=', 'hehe.post_id')
//             ->select('posts.*', 'likes.user_id as liker', 'hehe.likers as count');
        $transactionDetail = TransactionDetail::get();
        $coupon = Coupon::get();
        $ffotm = FFoTM::get();
        $base = Base::leftJoin('categories', 'categories.id', '=', 'bases.category_id')
            ->select('bases.*', 'categories.name as category')
            ->get();

        $strap = Strap::leftJoin('categories', 'categories.id', '=', 'straps.category_id')
            ->select('straps.*', 'categories.name as category')
            ->get();

        $tattoo = Tattoo::leftJoin('categories', 'categories.id', '=', 'tattoos.category_id')
            ->select('tattoos.*', 'categories.name as category')
            ->get();

        return view('admin',compact('webDetail','FAQ','category','transaction','transactionDetail','coupon','ffotm','base','strap','tattoo'));
    }

}
