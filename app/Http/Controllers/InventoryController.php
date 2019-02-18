<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Brand;
use App\Product;


class InventoryController extends Controller
{
    public function saveBrand(Request $request)
    {
    	$brand = new Brand;

    	$exists = DB::table('brands')->where('name',$request->name)->first();

    	if($exists)
        {
        	return response()->json(['msg'=>'have']);
        }
        else 
        {
        	$brand::create(

        		[
        			'name'=>$request->name,
        			'status'=>'1'
        		]
        	);

        	return response()->json(['msg'=>'created !']);
        }
    }
    //manage brands 
    public function getBrands()
    {
    	$brands = DB::table('brands')->get();

    	$returnHtml = view('brand.table',['table'=>$brands])->render();
    	return response()->json(['table'=>$returnHtml]);
    }

    //save category
    public function saveCategory(Request $request)
    {   
    	$category = new Category;

    	$exists = DB::table('categories')->where('name',$request->name)->first();

    	if($exists)
    	{
    		return response()->json(['msg'=>'have']);
    	}
    	else
    	{
    		$category::create(

    			[

    				'name'=>$request->name,
    				'parent_category'=>$request->parent,
    				'status'=>'1'
    		    ]
    	    );

    	    return response()->json(['msg'=>'created !']);
    	}
    }
    public static function getCategoryList()
    {
    	$category = DB::table('categories')->select('name')->get();
    	return $category;
    }

    public static function getBrandList()
    {
    	$brand = DB::table('brands')->select('name')->get();
    	return $brand;
    }

    //manage category
    public function getCategories()
    {
    	$categories = DB::table('categories')->get();

    	$returnHtml = view('category.table',['table'=>$categories])->render();
    	return response()->json(['table'=>$returnHtml]);
    }

    //save product

    public function saveProduct(Request $request)
    {   
    	$product = new Product;

    	$exists = DB::table('products')->where('name',$request->name)->first();

    	if($exists)
    	{
    		return response()->json(['msg'=>'have']);
    	}
    	else
    	{
    		$product::create(

    			[

    				'name'=>$request->name,
    				'category'=>$request->category,
    				'brand'=>$request->brand,
    				'price'=>$request->price,
    				'quantity'=>$request->quantity,
    				'status'=>'1'
    		    ]
    	    );

    	    return response()->json(['msg'=>'created !']);
    	}
    }
    //manage product

    public function getProducts()
    {
    	$products = DB::table('products')->get();

    	$returnHtml = view('product.table',['table'=>$products])->render();
    	return response()->json(['table'=>$returnHtml]);
    }



}
