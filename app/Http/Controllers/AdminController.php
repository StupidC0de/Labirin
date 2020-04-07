<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.dashboard');
    }
    public function history(){
    	return view('admin.history');
    }
    public function item(){
    	$data=Item::all();
    	return view('admin.item', compact('data'));
    }
}
