<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //显示数据
   public function list(Request  $request){
       $where = [];
       $keyword = $request->input('typename');
       if($keyword){
           $where[] = ['typename','like','%'.$keyword.'%'];
       }
       //如果是空置  默认查所有
       $list = ProductModel::where($where)->get();
//       $type = ProductModel::orderBy('id','asc')->
//       where(function ($query) use ($request){
//           $typename = $request->input('typename');
//           if (!empty($typename)){
//               $query->where('typename','like','%'.$typename.'%');
//           }
//       })->paginate(10);
       return $list;

   }

//   //查询
//    public function query(Request  $request)
//    {
//        $type = ProductModel::orderBy('id','asc')->
//        where(function ($query) use ($request){
//            $typename = $request->input('typename');
//            if (!empty($typename)){
//                $query->where('typename','like','%'.$typename.'%');
//            }
//        })->paginate(10);
//
//        return $type;
//}

    //添加
    public function add(Request $request)
    {
        //接受数据
        $input = $request->all();
//        dd($input);
        $res = ProductModel::create($input);
        //给前台反馈
        if ($res) {
            $data = [
                'status' => 0,
                'message' => '添加OK',
            ];
        }else{
            $data = [
                'status' => 1,
                'message' => '添加不ok',
            ];
        }
        return $data;
    }

//更新
    public function update($id , Request $request)
    {
        $type= ProductModel::find($id);
//dd($type);
        $typename = $request->input('typename');
//        dd($typename);
        $typeintroduction  = $request->input('typeintroduction');
        if(!$type){
            return null;
        }
        $type->typename = $typename;
//        dd($type);
        $type->typeintroduction= $typeintroduction;

        $res = $type->save();
//        dd($res);
        if ($res){
            $data=[
                'status'=>0,
                'message'=>'成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'message'=>'失败'
            ];
        }
        return  $data;
    }

    //删除
    public function delete($id)
    {
        $delete= ProductModel::find($id);
        $res = $delete->delete();
        if ($res){
            $data=[
                'status'=>0,
                'message'=>'成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'message'=>'失败'
            ];
        }
        return  $data;
    }
}
