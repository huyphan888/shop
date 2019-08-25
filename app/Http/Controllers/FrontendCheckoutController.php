<?php

namespace App\Http\Controllers;



use App\Cate;
use App\Mail\shipping;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class FrontendCheckoutController extends Controller
{

    public function __construct()
    {
        \View::share(['cates' => Cate::get()->toTree()]);

    }
    public function index()
    {
        $cart = session('cart')?session('cart'): [];
        if(count($cart)>0){
            $products = Product::whereIn('id', array_keys($cart))->get();
            $sum = session('sum');
            foreach ($products as $product) {
                if(array_key_exists($product->id,$cart)){
                    $product->quantity = $cart[$product->id]['quantity'];
                    $product->subtotal = $product->quantity * $product->sale_price;
                }
           }

        }

        return view('frontend.default.checkout', compact(['sum', 'products']));
    }
    public function checkout(Request $request){
        $cart = session('cart')?session('cart') : [];
        if(count($cart)>0){
            $request->validate([
                'address'=>'required',
                'phone'=>'required',
                'email'=>'required',
                'name'=>'required'
            ]);
            $products = Product::whereIn('id', array_keys($cart))->get();
            foreach ($products as $product) {
                $productID[$product->id] = ['quantity' => $cart[$product->id]['quantity']];

            }
            $request->merge(['user_id' => \Auth::user()->id?\Auth::user()->id:null]);


            $order=Order::create($request->all());
            $order->products()->sync($productID);

            //mail
            Mail::to($request->email)->send(new shipping($order));
            $request->session()->forget(['cart', 'sum','total']); //xoa session

            return redirect()->route('frontend.thankyou')->with('success', 'ban da dat hang thanh cong,chung toi se lien he voi ban trong thoi gian som nhat!');
        }

    }

    public function thankyou()
    {
        return view('frontend.default.thankyou');
    }


}
