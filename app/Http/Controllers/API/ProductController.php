<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /** 
     * Get All Products Item List
     * 
     * @return \Illuminate\Http\Response 
     */

    public function getAllProducts()
    {
        try {
            $allProducts = Product::all();
            $data = [
                'success' => true,
                'data' => $allProducts
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
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
        try {
            $item = Product::where('id', $id)->first();
            $data = [
                'success' => true,
                'data' => $item
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
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
        try {
            $allCategories = Category::all();
            $data = [
                'success' => true,
                'data' => $allCategories
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
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
        try {
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
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /** 
     * Add to cart
     * 
     * @return \Illuminate\Http\Response 
     */

    public function addToCart(Request $req)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;
            $cart = new Cart;
            $cart->product_id = $req->product_id;
            $cart->user_id =  $userId;
            $cart->save();
            $data = [
                'success' => true,
                'message' => 'Product has been added to the cart!.',
                'data' => $cart
            ];
            return response()->json($data, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /** 
     * Get user cart detail
     * 
     * @return \Illuminate\Http\Response 
     */
    public function getUserCartDetails()
    {
        try {
            $user = Auth::user();
            $userId = $user->id;
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id', 'carts.user_id')
                ->get();
            if ($products) {
                return response()->json(['status' => 'true', 'message' => 'Cart Details of User', 'data' => $products]);
            } else {
                return response()->json(['status' => 'false', 'message' => 'No data found for that user', 'data' =>[] ],404);
            }
        } catch (\Exception $e) {
            return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]], 500);
        }
    }
}
