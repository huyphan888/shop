<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use DB;


class FrontendHomeController extends Controller
{
    public function __construct()
    {
        \View::share(['cates' => Cate::get()->toTree()]);

    }
    public function index(Request $request)
    {
//        $request->session()->forget(['cart', 'sum','total']); //xoa session

        //best seller
        $time = date('Y-m-d', time() - (86400*7));
        $bestseller = /*Product::join('order_product as op', 'op.product_id', '=', 'products.id')
            ->select('products.*',DB::raw('SUM(op.quantity) as total'))
            ->groupBy('product_id')
            ->whereDate('products.updated_at', '>=',$time)
            ->orderBy('total','desc')
            ->limit(7)
            ->get();*/
            Product::all();


        //smartphone & laptop
        $cateParent = Cate::find(1);
        $cateChildren=$cateParent->descendants()->pluck('id');
        $cateChildren[] = $cateParent->id;
        $products = Product::whereIn('cate_id',$cateChildren)->take(4)->with('cate')->orderBy('id', 'desc')->get(); //smartphone

        $cateParent = Cate::find(2);
        $cateChildren=$cateParent->descendants()->pluck('id');
        $cateChildren[] = $cateParent->id;
        $products2 = Product::whereIn('cate_id',$cateChildren)->take(4)->with('cate')->orderBy('id', 'desc')->get(); //laptop


        return view('frontend.default.index',compact(['cates','bestseller','products','products2']));
    }

    public function detail(Request $request,$cate,$slug,$id)
    {
        $product = Product::find($id);

        //recent products
        $cookie=is_array($json=json_decode($request->cookie('recent_products')))?$json:[];
        if(!in_array($product->id,$cookie)){
            array_unshift($cookie,$id);
            if(count($cookie)>8){
                array_slice($cookie,0,8);
            }
        }
        if(is_array($cookie)){
            $recent_products=Product::whereIn('id',$cookie)->get();
        }
        //end recent products

        $comments = Comment::where('is_active', 1)->get();


        return response()->view('frontend.default.detail',compact('product','recent_products','comments'))->cookie(
            'recent_products',json_encode($cookie),1440
        );
    }

    public function comment(Request $request,$cate,$slug,$id)
    {
        $validator = \Validator::make($request->all(), [
            'content'=>'required',
            'score'=>'required|between:1,5',
        ]);

        if ($validator->fails()) {
            return \Redirect::to(\URL::previous() . "#add-review")->withErrors($validator);
        }
        /* persisting data */
        $user = \Auth::user();
        $input = $request->all();
        $input['product_id'] = $id;
        $input['rating'] = $request->score;
        $input['photo'] = $user->img?$user->img:"uploads/no_image.jpg";
        $input['name'] = $user->name;
        $input['email'] = $user->email;

        Comment::create($input);
        return \Redirect::to(\URL::previous() . "#add-review")->with('success', 'Thank you for your comment!');
    }

    public function products(Request $request)
    {
        //san pham noi bat
        $featured = Product::where('featured',1)->take(4)->with('cate')->orderBy('id', 'desc')->get();

        //danh sach san pham
        $order = $request->order;
        $cate_id = $request->cate_id;

        $search = $request->search;
        $products = Product::when($order, function ($query, $order) {
                return $query->orderBy('id',$order);
            }, function ($query) {
                return $query->orderBy('id');
            })
            ->when($search, function ($query, $search) {

                $query->whereRaw("(name like ? or code like ?)", ["%$search%","%$search%"]);
            })
            ->when($cate_id, function ($query, $cate_id) {
                return $query->where('cate_id', $cate_id);
            })
            ->with('cate')->paginate(4);


        return view('frontend.default.products',compact(['products','featured']));
    }
    public function cates(Request $request,$slug)
    {
        $featured = Product::where('featured',1)->take(4)->with('cate')->orderBy('id', 'desc')->get();
        $cate = Cate::where('slug', $slug)->first();

        //get all id of itself and descendant of id
        $categories = $cate->descendants()->pluck('id');
        $categories[] = $cate->getKey();



        $products = Product::whereIn('cate_id',$categories);
//        dd($products);


        if($order = $request->order){
            switch ($order){
                case 'latest':
                    $products = Product::orderBy('id', 'desc');
                    break;
                default:
                    $products = Product::orderBy('id', 'asc');
                    break;


            }
        }
        if($search=$request->search){
            $products = $products->where(function ($query) use ($search){
                $query->where('name', 'like', "%$search%")
                    ->orWhere('code', 'like', "%$search%");
            });
        }
        if($cate_id=$request->cate_id){
            $products = $products->where('cate_id', $cate_id);
        }
        $products = $products->paginate(6);


        return view('frontend.default.products',compact(['products','cate','featured']));
    }
}
