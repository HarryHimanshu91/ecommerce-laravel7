<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\DB;
use Session;


class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->get();
        return view('product', ['products' => $data]);
    }

    public function details($id)
    {
        $data =  Product::find($id);
        //dd($data['category']);
        $categoryName =  Category::where('id' , $data['category'])->first();
       // dd($categoryName);

    

        return view('details', compact('data','categoryName'));
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
            $data = array('product_id' => $product_id, 'user_id' => $user_id);
            DB::table('carts')->insert($data);
            echo "<script>alert('Product has been added to cart. Go to the cart to see the product!!');
            window.location = '/';</script>";
           //  return  redirect('/');
        } else {
            return redirect('/login');
        }
    }


    public static function totalCartItem()
    {
        $user_id = Session::get('user')['id'];
        $countItem = Cart::where('user_id', $user_id)->count();
        return $countItem;
    }

    public function totalCartList()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id')
            ->get();
        return view('cartlist', compact('products'));
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
       // return redirect('cart_list');

        echo "<script>alert('Your Item Has Been Successfully Removed From Cart List...');
         window.location = '/cart_list';</script>";
    }


    public function OrderNow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->sum('products.price');

        return view('orderNow', compact('total'));
    }

    public function placeOrder(Request $req)
    {
         $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->phone=$req->phone;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
        // return redirect('/');
         echo "<script>alert('Your order has been placed successfully.. Go to the my order to see the order details!!');
         window.location = '/';</script>";
    }


    public function UserOrder()
    {
        $userId = Session::get('user')['id'];
        $totalUserOrder = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('userOrder',compact('totalUserOrder'));
    }
}
