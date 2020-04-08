<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;

class AdminController extends Controller
{
    public function index(){
    	$data=Order::where('status', 'Waiting')->get();
    	return view('admin.dashboard', compact('data'));
    }
    public function history(){
    	$data=Order::where('status', 'Accepted')->orWhere('status', 'Rejected')->get();
    	return view('admin.history', compact('data'));
    }
    public function item(){
    	$data=Item::all();
    	return view('admin.item', compact('data'));
    }
}
