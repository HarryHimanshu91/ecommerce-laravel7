<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\DB;

use Session ;


class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function details($id)
    {
        $data =  Product::find($id);
        return view('details', compact('data'));
    }

    public function search(Request $req)
    {
        $query =  $req->input('query');
        $data = Product::where('name', 'like', '%' . $query . '%')->get();
        return view('search', compact('data'));
    }

    public function add_to_cart(Request $req)
    {
        if ($req->session()->has('user')) {
            $product_id = $req->product_id = $req->product_id;
            $user_id = $req->user_id = $req->session()->get('user')['id'];
            $data = array('product_id' => $product_id ,'user_id' => $user_id);
            DB::table('carts')->insert($data);
            return  redirect('/');
        }else
        {
            return redirect('/login');
        }
    }


    public static function totalCartItem()
    {
        $user_id = Session::get('user')['id'];
        $countItem = Cart::where('user_id' , $user_id)->count();
        return $countItem;
    }

    public function totalCartList()
    {
        $userId=Session::get('user')['id'];
        $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->get();
        return view('cartlist', compact('products'));
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cart_list');
    }
}
