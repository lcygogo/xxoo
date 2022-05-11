<?php

namespace App\Http\Controllers;

use App\Models\ProductMModel;
use Illuminate\Http\Request;

class ProduceMController extends Controller
{
    //显示数据
    public function list(Request  $request){
        $where = [];
        $keyword = $request->input('name');
        $keyword1 = $request->input('type');
        $keyword2 = $request->input('pid');
        $keyword3 = $request->input('state');
        if($keyword or $keyword1){
            $where[] = ['name','like','%'.$keyword.'%'];
            $where[] = ['type','like','%'.$keyword1.'%'];
            $where[] = ['pid','like','%'.$keyword2.'%'];
            $where[] = ['state','like','%'.$keyword3.'%'];
        }
        //如果是空置  默认查所有
        $list = ProductMModel::where($where)->get();
        return $list;
    }

    //添加
    public function add(Request $request)
    {
        //接受数据
        $input = $request->all();
//        dd($input);
        $res = ProductMModel::create($input);
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
        $type1 = ProductMModel::find($id);
//dd($type);
        $name = $request->input('name');
        $pid = $request->input('pid');
        $state = $request->input('state');
        $date = $request->input('date');
        $type = $request->input('type');
        $department = $request->input('department');
        $introduce = $request->input('introduce');
        $memberprice = $request->input('memberprice');
        $nonmemberprice = $request->input('nonmemberprice');
//        dd($typename);

        if(!$type1){
            return null;
        }
        $type1->name = $name;
//        dd($type);
        $type1->state=$state;
        $type1->date=$date;
        $type1->pid=$pid;
        $type1->type=$type;
        $type1->department=$department;
        $type1->introduce=$introduce;
        $type1->memberprice=$memberprice;
        $type1->nonmemberprice=$nonmemberprice;

        $res = $type1->save();
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
        $delete= ProductMModel::find($id);
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
