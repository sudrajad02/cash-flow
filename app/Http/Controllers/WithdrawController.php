<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;

class WithdrawController extends Controller
{
    public function index() {
        return view("withdraw/index", [
            "title" => "Withdraw",
            "cash" => CashFlow::where('isDeposit', '!=', 1)->get()
        ]);
    }

    public function add() {
        return view("withdraw/add", [
            "title" => "Withdraw",
        ]);
    }

    public function save(Request $request) {
        $validated = $request->validate([
            'amount' => 'required'
        ]);

        if ($request->amount % 50000 != 0) {
            return response()->json([
                'success'   => "false",
                'message'   => "Data gagal diinputkan amount harus berkelipatan Rp. 50.000",
                'data'      => []
            ], 400);
        }

        CashFlow::create([
            'orderId'   => '1111111111desaes',
            'amount'    => $request->amount,
            'userId'    => 1,
            'isDeposit' => 0,
        ]);

        return redirect("/withdraw");
    }
}
