<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Http\Requests\CateRequest;
use Illuminate\Support\Str;

class AdminCatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates= Cate::withDepth()->defaultOrder()->get();
        $catesTree = Cate::get()->toTree();

        return view('admin.cates.index',compact('cates','catesTree'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cates = Cate::get()->toTree();

        return view('admin.cates.create',compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        $request->merge(['slug'=> Str::slug($request->name)]);
        Cate::create($request->all());
        return redirect('admin/cates')->with('success', 'them cate thanh cong');
    }


    public function edit(Cate $cate)
    {
        $cates = Cate::where('id', '<>', $cate->id)->get()->toTree();
        return view('admin.cates.edit',compact(['cate','cates']));
    }


    public function update(CateRequest $request,Cate $cate)
    {

        $request->merge(['slug'=> Str::slug($request->name)]);
        $cate->update($request->all());

        return redirect('admin/cates')->with('success', 'edit '.$cate->name.' thanh cong');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cate $cate)
    {
        $cate->delete();
        return redirect()->back()->with('success','xoa '.$cate->name.' thanh cong');
    }
}
