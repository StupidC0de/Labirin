<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
Use Alert;
use Auth;
use App\Order;

class CustomerController extends Controller
{
    public function index(){
    	$data =Item::all();
    	return view('cust.dashboard', compact('data'));
    }

    public function history(){
    	$data=Order::where('id_customer', Auth::guard('customer')->user()->id)->get();
    	return view('cust.history', compact('data'));
    }

    
}
