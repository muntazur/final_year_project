<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function updateBrand(Request $request)
    {
    	$updated = DB::table('brands')->where('name',$request->previous)->update(['name'=>$request->current]);
    	if($updated)
    	{
    		return response()->json(['msg'=>'updated !']);
    	}
    	
    }
    public function deleteBrand(Request $request)
    {
    	$delete = DB::table('brands')->where('name',$request->current)->delete();

    	if($delete)
    	{
    		return response()->json(['msg'=>'deleted !']);
    	}
    }
}
