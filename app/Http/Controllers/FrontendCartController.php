<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Product;
use Illuminate\Http\Request;


class FrontendCartController extends Controller
{
    public function __construct()
    {
        \View::share(['cates' => Cate::get()->toTree()]);

    }
    public function index()
    {
            $data=[
                'total' => session('total'),
                'sum' =>format(session('sum')),
                'cart'=>session('cart')
            ];
            return view('frontend.default.cart',$data);
    }

    public function update(Request $request)
    {
        $cart = session('cart');
        $sum = 0;
        $key = $request->id;
        if($request->quantity>=1){
            $cart[$key]['quantity'] = $request->quantity;
            $cart[$key]['sum'] = format($request->quantity*$cart[$key]['price']);

        }
        foreach ($cart as $value){
            $sum += $value['price']*$value['quantity'];
        }

        session(['cart' => $cart,'sum'=>$sum]);

        return response()->json([
            'sum' =>format($sum),
            'cart'=>$cart
        ]);

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $cart = session('cart');
        $total = session('total')-1;
        $sum = 0;
        unset($cart[$id]);
        foreach ($cart as $value){
            $sum += $value['price']*$value['quantity'];
        }

        session(['cart' => $cart,'sum'=>$sum,'total'=>$total]);

        return response()->json([
            'sum' =>format($sum),
            'cart'=>$cart,
            'total'=>$total
        ]);

    }
    public function deleteAll(Request $request)
    {
        $request->session()->forget(['cart', 'sum','total']); //xoa session

        return redirect()->route('frontend.home');
    }

    public function addToCart(Request $request)
    {
        //id la id san pham,quantity=1
        $id = $request->id;
        $product = Product::find($id);
//        dd(session()->all());
        $cart = session('cart') ? session('cart') : [];
        if (!array_key_exists($id, $cart)) {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->sale_price,
                'image' => $product->image?asset("$product->image"):asset('images/no_image.jpg'),
                'quantity' => $quantity=$request->quantity ? $request->quantity : 1,
                'sum'=>format($product->sale_price*$quantity),
                'code'=>$product->code,
                'url'=>route('frontend.detail',[$product->cate->slug,str_slug($product->name),$product->id])

            ];
        } else {
            $cart[$id]['quantity'] += $request->quantity ? $request->quantity : 1;
            $cart[$id]['sum'] = format($product->sale_price * $cart[$id]['quantity']);
        }
        //tong so tien = sum,tong so loai san pham = total
        $sum = 0;
        foreach ($cart as $item) {
            $sum += $item['price'] * $item['quantity'];
        }
        //luu session
        session([
            'cart' => $cart,
            'sum'=>$sum,
            'total'=>count($cart)
        ]);

        return response()->json([
            'cart' => $cart,
            'sum'=>format($sum),
            'total'=>count($cart)
        ]);
    }

    public function getCart(Request $request)
    {
        $cart = session('cart') ? session('cart') : [];
        $sum = session('sum');
        $total = session('total');

        return response()->json([
            'total' => $total,
            'sum' =>format($sum),
            'cart'=>$cart
        ]);

    }




}
