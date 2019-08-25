<?php

namespace App\Http\Controllers;


use App\Cate;
use App\Http\Requests\ProductsRequest;
use App\Product;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


/**
 * Class AdminProductsController
 * @package App\Http\Controllers\Backend
 */
class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $products = Product::with(['cate', 'user']);
        if($search=$request->search){
            $products->where('name', 'like', "%$search%")->orWhere('code','like',"%$search%");
        }
        $products = $products->orderBy('id', 'desc')->paginate(10);



        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::get()->toTree();

        return view('admin.products.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {

        $data = $request->all();

        $data['user_id']=Auth::user()->id;
        $data['code'] = strtoupper($request->code);
        
        /*if ($file=$request->file('image')) {
            $data['image']=upload($file);
        }*/
        if ($data['filepath']) {
            $data['image']=$data['filepath'];
        }

        //attributes
        $attributes = $request->input('attributes');
        foreach ($attributes as $key => $item) {
            if ($item['name'] == null || $item['value'] == null) {
                unset($attributes[$key]);
                continue;
            }
        }
        $data['attributes'] = $attributes?$attributes:NULL;


        //luu CSDL

        $product=Product::create($data);

        //luu tag
        if ($request->has('tags')){
            $tags = $request->input('tags');
            foreach ($tags as $tag) {
                $tagObj= Tag::firstOrCreate(['name'=>$tag],['slug'=>Str::slug($tag)]);
                $idTag[]=$tagObj->id;
            }
            $product->tags()->attach($idTag); //luu vao bang trung gian
        }

        // thu vien hinh anh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $item) {
                $product->attachments()->create([
                    'path'=>upload($item)
                ]);

            }
        }

        return redirect('admin/products')->with('success', 'them products thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $tags = $product->tags;
        $cates = Cate::get()->toTree();
        return view('admin.products.edit',compact('product','cates','tags'));
    }


    public function update(ProductsRequest $request, Product $product)
    {

        // thu vien hinh anh
        if ($request->hasFile('images')) {
            foreach($product->attachments as $attachment){
                deleteUpload($attachment->path);    //xoa hinh
                $attachment->delete();
            }
            foreach ($request->file('images') as $item) {
                $product->attachments()->create([
                    'path'=>upload($item)
                ]);
            }
        }

        //chuan bi luu vao CSDL
        $request->merge(['user_id' => Auth::id(), 'code' => strtoupper($request->code)]);
        $data = $request->all();


        if ($data['filepath']) {
            $data['image']=$data['filepath'];
        }


        //attributes
        $attributes = $request->input('attributes');

        foreach ($attributes as $key => $item) {
            if ($item['name'] == null || $item['value'] == null) {
                unset($attributes[$key]);
                continue;
            }
        }

        $data['attributes'] = $attributes?json_encode($attributes):NULL;
        //luu CSDL


        $product->update($data);


        //luu tag
        if ($request->has('tags')){
            $tags = $request->input('tags');
            foreach ($tags as $tag) {
                $tagObj= Tag::firstOrCreate(['name'=>$tag],['slug'=>Str::slug($tag)]);
                $idTag[]=$tagObj->id;
            }
            $product->tags()->sync($idTag); //luu vao bang trung gian

        }

        return redirect()->back()->with('success', 'edit products thanh cong');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //xoa anh img post
        deleteUpload($product->image);
        //xoa attachment
        foreach($product->attachments as $attachment){
            deleteUpload($attachment->path);
            $attachment->delete();
        }
        $product->delete();

        return redirect()->back()->with('success', 'xoa ' . $product->name . ' thanh cong');




    }
    /*public function featured($id)
    {
        $product = Product::find($id);
        $product->featured = !$product->featured;
        $product->save();
        if($product->featured){
            return redirect()->back()->with('success', 'san pham '.$product->name.'da duoc tro thanh san pham noi bat');
        }else{
            return redirect()->back()->with('warning', 'san pham '.$product->name.'da bi loai bo khoi danh sach san pham noi bat');
        }

    }*/
    public function bulk(Request $request)
    {

        if ($request->bulk == 'delete') {
            $products = Product::findOrFail($request->delete);
            foreach ($products as $product){
                $product->delete();
            }

        }
        return redirect()->back();


    }


}
