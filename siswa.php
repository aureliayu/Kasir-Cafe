<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswamodel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facedes\Hash;


class siswa extends Controller
{
    public function addsiswa(Request $req){
        $validator = validator::make($req->all(),[
            'nama' => 'required',
            'alamat' => 'required',
            'kelas'=>'required',
        ]);   
        if($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = siswamodel::create([
            'nama' => $req->get('nama'),
            'kelas' => $req->get('kelas'), 
            'alamat' => $req->get('alamat'),
        ]);
        if($save){
            return response()->json(['status' => true,'message' => 'data siswa sudah masuk']);
        }else{
            return response()->json(['status'=>false,'message'=> 'coba lagi:(']);
        }
    }
}
