<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;

class CashFlowController extends Controller
{
    public function index() {
        $deposit = CashFlow::where('isDeposit', 1)->sum('amount');
        $withdraw = CashFlow::where('isDeposit', '!=', 1)->sum('amount');
        $remains = $deposit - $withdraw;

        return view("/home", [
            "title" => "Home",
            "remains" => $remains
        ]);
    }
}
