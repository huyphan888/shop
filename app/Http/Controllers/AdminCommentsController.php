<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;


class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(8);
        return view('admin.comments.index',compact('comments'));

    }

    public function show(Request $request,$id)
    {
        $comment = Comment::find($id);
        $comment->is_active = !$comment->is_active;
        $comment->save();
        return back();

    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back()->with('success','xoa thanh cong');

    }
}
