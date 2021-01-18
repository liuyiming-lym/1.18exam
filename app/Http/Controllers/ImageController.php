<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //展示表单
    public function create()
    {
        return view('create');
    }
    //异步上传
    public function upload(Request $request)
    {
        if ($request->hasFile('pic')){
            $path = $request->file('pic')->store('','upload');
            $path = '/img/'.$path;
        }
        return ['code'=>200,'path'=>$path];
    }
    //添加入库
    public function save(Request $request)
    {
//        $data = $request->all();

        $res = Image::create( $request->except('_token'));
        if ($res){
            return redirect(route('show'));
        }
    }
    //列表展示
    public function show(){
        $data = Image::get();
        return view('show',compact('data'));

    }
    //删除
    public function delete(Request $request,$id)
    {
//        $id = $request->get('id');
        Image::where('id',$id)->delete();
        return ['code'=>200,'msg'=>'删除成功'];
    }
}
