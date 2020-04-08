<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;

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
    public function acc($id)
    {
        
        $i=Order::find($id);
        
        $i->status='Accepted';        
        $i->save();
        return redirect()->route('admin.dashboard');
    }
    public function rjc($id)
    {
        
        $i=Order::find($id);
        
        $i->status='Rejected';        
        $i->save();
        return redirect()->route('admin.dashboard');
    }
    public function edit(Request $request,$id){
        $i=Item::find($id);
        $i->name=$request->name;
        $i->dimension=$request->dimension;
        $i->output=$request->output;
        $i->price=$request->price;
        $i->save();
        return redirect()->route('admin.item');

    }
    public function delete($id)
    {
        
        $i=Item::find($id);       
        $i->delete();
        return redirect()->route('admin.item');
    }
}
