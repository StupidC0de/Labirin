<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Order;

class CustomerActionController extends Controller
{
    public function buy(Request $request){
    	$i= new Order();
    	$i->id_customer=$request->idcust;
    	$i->id_item=$request->iditem;
    	$i->amount=$request->amount;
    	$i->price=$request->price;
    	$i->date=$request->date;
    	$i->status="Waiting";
    	$i->save();
    	alert()->success('Success','')->autoClose(1000);
    	return redirect()->route('cust.dashboard');
    }
    public function cancel($id){
        $i= Order::find($id);
        $i->delete();
        return redirect()->route('cust.history');
    }
}
