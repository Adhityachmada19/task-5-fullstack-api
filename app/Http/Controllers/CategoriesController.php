<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function all(){
        $data=Categories::all();
        return response()->json([
            'status'=>200,
            'message'=>'Data berhasil dibuka',
            'data'=>$data
        ]);
    }
    public function show($id){
        $data=Categories::find($id);
        if($data==null){
            return response()->json([
                'status'=>401,
                'message'=>'Id Tidak Ditemukan'
            ]);
        return response()->json([
            'status'=>200,
            'message'=>'Data berhasil dibuka',
            'data'=>$data
        ]);
    }
}
    public function store(Request $request){
        $data=Categories::Create([
            'name'=>$request->name
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'Data berhasil ditambahkan',
            'data'=>$data
        ]);
    }
    public function update($id,Request $request){
        $categories=Categories::find($id);
        if($categories==null){
            return response()->json([
                'status'=>400,
                'message'=>'Id Tidak Ditemukan'
            ]);
        }else{
            $data=$categories->update([
                'name'=>$request->name
            ]);
        return response()->json([
            'status'=>201,
            'message'=>'Data berhasil diubah',
        ]);
    }
    }
    public function delete($id){
        $categories=Categories::find($id);
        if($categories==null){
            return response()->json([
                'status'=>400,
                'message'=>'Id Tidak Ditemukan'
            ]);
        }else{
            $data=$categories->delete();
        return response()->json([
            'status'=>201,
            'message'=>'Data berhasil dihapus',
        ]);
    }
    }
}
