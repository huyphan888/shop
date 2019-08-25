<?php

namespace App\Http\Controllers;


use App\Cate;
use App\Comment;
use App\Product;

class AdminHomeController extends Controller
{

    public function index()
    {
         $productsCount = Product::count();
         $commentsCount = Comment::count();
         $categoriesCount = Cate::count();

        return view('admin.template.home',compact('productsCount','commentsCount','categoriesCount'));
    }
}
