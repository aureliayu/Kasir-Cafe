<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facedes\Hash;


class CoffeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','getcoffee']]);
    }
    public function getcoffee()
    {
        $dt_coffee = CoffeeModel::get();
        return response()->json($dt_coffee);
    }
    //POST 
    public function addcoffee(Request $req){
        $validator = validator::make($req->all(),[
            'name' => 'required',
            'size' => 'required',
            'price'=>'required',
            'image'=>'required',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = CoffeeModel::create([
            'name' => $req->get('name'),
            'size' => $req->get('size'), 
            'price' => $req->get('price'),
            'image' => $req->get('image'),
        ]);
        if($save){
            return response()->json(['status' => true,'message' => 'Coffee has retrieved']);
        }else{
            return response()->json(['status'=>false,'message'=> 'try again:(']);
        }
    }
    //PUT 
    public function updatecoffee (Request $req, $id){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'size' => 'required',
            'price'=>'required',
            'image'=>'required',
        ]);
    if ($validator->fails()){
        return response()->json($validator->errors()->toJson());
    }
    $ubah = CoffeeModel::where('id',$id)->update([  
        'name' => $req->get('name'),
        'size' => $req->get('size'), 
        'price' => $req->get('price'),
        'image' => $req->get('image'),
    ]);

    if ($ubah){
        return response()->json(['status'=>true,'message'=>'Coffee has updated']);
    } else {
        return response()->json(['status'=>false,'message'=>'try again:(']);
    }
    } 
    //DELETE
     public function deletecoffee($id)
    {
    $hapus=CoffeeModel::where('id',$id)->delete();
    if($hapus){
        return response()->json(['status'=>true, 'message'=>' Success deleted']);
    } else {
        return response()->json(['status'=>false,'message'=>' try again:( ']);
    }
}

}