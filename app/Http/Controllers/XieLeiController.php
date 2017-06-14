<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class XieLeiController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

    }
    public function show()
    {

        $res=DB::table('category')->where('pid',0)->get();
        foreach($res as $val){
            $cate=DB::table('category')->where('pid',$val->id)->get();
            $val->children=$cate;
        }
        $data['category']=$res;
            return response($data);
    }


}
