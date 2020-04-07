<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class AdminActionController extends Controller
{
    public function additem(Request $request){
    	$i = new Item();
    	$i->name=$request->name;
    	$i->dimension=$request->dimension;
    	$i->output=$request->output;
    	$i->price=$request->price;
    	$i->save();
    	return redirect()->route('admin.item');

    }
}
