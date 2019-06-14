<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function getIndex() {
        return view('admin.pages.home');
    }

    public function orders() {
        $orders = DB::table('orders')
                ->join('members','members.id','=','orders.mem_id')
                ->select('orders.*','members.*')
                ->get();
        return view('admin.pages.orders', compact('orders'));
    }

}
