<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransactionDetail::where('transaction_id', '=', $id)->delete();
        $transaction = Transaction::destroy($id);
        return back();
    }

    public function detail($id)
    {
        $transactionDetail = TransactionDetail::where('transaction_id', '=', $id)
                            ->leftJoin('bases', 'transaction_details.base_id', '=', 'bases.id')
                            ->leftJoin('straps', 'transaction_details.strap_id', '=', 'straps.id')
                            ->leftJoin('tattoos', 'transaction_details.tattoo_id', '=', 'tattoos.id')
                            ->select('bases.name as base_name', 'straps.name as strap_name', 'tattoos.name as tattoo_name', 'transaction_details.quantity')
                            ->get();
        return response()->json([
           'success' => true,
           'data' => $transactionDetail,
        ]);
    }

    public function changestatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = $request->status;
        $transaction->save();
        return back();
    }
}