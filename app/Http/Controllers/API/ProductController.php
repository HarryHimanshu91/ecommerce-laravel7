<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

     /** 
     * Get All Products Item List
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function getAllProducts()
    {
        try{
            $allProducts = Product::all();
            $data = [
                'success' => true,
                'data' => $allProducts
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }


     /** 
     * Get Product Item with Id
     * 
     * @return \Illuminate\Http\Response 
     */

    public function getProductDetail($id)
    {
        try{
            $item = Product::where('id',$id)->first();
            $data = [
                'success' => true,
                'data' => $item
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }


    /** 
     * Get All Categories of Product
     * 
     * @return \Illuminate\Http\Response 
     */

    public function getAllCategories()
    {
        try{
            $allCategories = Category::all();
            $data = [
                'success' => true,
                'data' => $allCategories
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }

    /** 
     * List all product with specific category
     * 
     * @return \Illuminate\Http\Response 
     */

    public function getCategoryProduct($id)
    {
        try{
            $item = DB::table('products')
            ->join('categories', 'products.category', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.category', $id)
            ->get();
            
            $data = [
                'success' => true,
                'data' => $item
            ];
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 422);
        }
    }

}
