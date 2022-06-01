<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function all(){
        $data=Posts::with('category')->paginate(5);
        return response()->json([
            'status'=>200,
            'message'=>'Data berhasil dibuka',
            'data'=>$data
        ]);
    }
    public function show($id){
        $posts=Posts::with('category')->find($id);
        if($posts==null){
            return response()->json([
                'status'=>401,
                'message'=>'Id Tidak Ditemukan'
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'message'=>'Berhasil Dibuka',
                'data'=> $posts
            ]);
        }
    }
    public function store(Request $request){
        $data=Posts::Create([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'author'=>$request->author
        ]);
        
        return response()->json([
            'status'=>200,
            'message'=>'Data berhasil ditambahkan',
            'data'=>$data
        ]);
    }
    public function update($id,Request $request){
        $posts=Posts::find($id);
        if($posts==null){
            return response()->json([
                'status'=>400,
                'message'=>'Id Tidak Ditemukan'
            ]);
        }else{
            $data=$posts->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'author'=>$request->author
            ]);
        return response()->json([
            'status'=>201,
            'message'=>'Data berhasil diubah',
        ]);
    }
    }
    public function delete($id){
        $posts=Posts::find($id);
        if($posts==null){
            return response()->json([
                'status'=>400,
                'message'=>'Id Tidak Ditemukan'
            ]);
        }else{
            $data=$posts->delete();
        return response()->json([
            'status'=>201,
            'message'=>'Data berhasil dihapus',
        ]);
    }
    }
}
