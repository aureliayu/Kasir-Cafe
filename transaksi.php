<?php

namespace App\Http\Controllers;

use App\Models\Ordermodel;
use App\Models\Listmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class transaksi extends Controller
{

 public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'order']]);
    }

//     //tambah item
    public function tambahOrder (Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'coffee_id' => 'required',
            'quantity' => 'required', 
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $save = Ordermodel::create([
            'coffee_id' => $req->input('coffee_id'),
            'quantity' => $req->input('quantity'),
            'order_id' => $id,
            'price' => $req->input('price'),
        ]);
        if ($save) {
            return response()->json(['success' => true, 'message '=>'succsess add']);
        } else {
            return response()->json(['success' => false, 'message'=>'try again:(']);
        }
    }
    //order baru
    public function order (request $req){
        $validator = Validator::make($req->all(), [
            'customer_name' => 'required',
            'order_type' => 'required',
            'order_date'=>'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $save = Listmodel ::create([
            'customer_name' => $req->input('customer_name'),
            'order_type' => $req->input('order_type'),
            'order_date' => $req->input('order_date')

        ]);
        if ($save) {
            return response()->json(['success' => true, 'message'=>'customer add']);
        } else {
            return response()->json(['success' => false, 'message' =>'try again:(']);
        }
    }

    public function getdetail($id)
    {
       $order= Listmodel::where('id', $id)->get();
       $detail = Ordermodel::where('id',$id)->get();

       $gather = $order->map(function($orderer) use ($detail){
        $orderer->setAttribute('Listmodel', $detail);
        return $orderer;
       });

       $response=[
        'status'=> true,
        'data' => $gather,
        "message"=>'Order list has retrivied'
       ];
        return response()->json($response); 
}

public function getdetailall()
{
   $order=Listmodel::get();
   $detail = Ordermodel::get();

   $gather = $order->map(function($orderer) use ($detail){
    $orderer->setAttribute('Ordermodel', $detail);
    return $orderer;
   });

   $response=[
    'status'=> true,
    'data' => $gather,
    "message"=>'Order list has retrivied'
   ];
    return response()->json($response);
}

}


