<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;

class DepositController extends Controller
{
    public function index() {
        return view("deposit/index", [
            "title" => "Deposit",
            "cash" => CashFlow::where('isDeposit', '=', 1)->get()
        ]);
    }

    public function add() {
        return view("deposit/add", [
            "title" => "Deposit"
        ]);
    }

    public function save(Request $request) {
        $validated = $request->validate([
            'amount' => 'required'
        ]);

        CashFlow::create([
            'orderId'   => '1111111111desaes',
            'amount'    => $request->amount,
            'userId'    => 1,
            'isDeposit' => 1,
        ]);

        return redirect("/deposit");
    }
}
