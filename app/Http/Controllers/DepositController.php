<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;
use Illuminate\Support\Facades\Validator;

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
            'isDeposit' => 1,
        ]);

        return redirect("/deposit");
    }

    public function saveFromApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id'     => 'required|string',
            'amount'      => 'required|numeric',
            'timestamp'   => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'success'   => "false",
                'message'   => $error,
                'data'      => []
            ], 400);
        }

        if ($request->amount % 50000 != 0) {
            return response()->json([
                'success'   => "false",
                'message'   => "Data gagal diinputkan amount harus berkelipatan Rp. 50.000",
                'data'      => []
            ], 400);
        }

        CashFlow::create([
            'orderId'   => $request->order_id,
            'amount'    => $request->amount,
            'userId'    => 1,
            'isDeposit' => 1,
            'created_at' => $request->timestamp
        ]);

        $data = [
            "order_id" => $request->order_id,
            "amount" => $request->amount,
            "status" => 1
        ];

        return response()->json([
            'success'   => "true",
            'message'   => "Data Berhasil diinputkan",
            'data'      => $data
        ], 200);
    }
}
