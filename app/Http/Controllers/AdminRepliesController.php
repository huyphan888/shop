<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Requests\CommentEditRequest;
use App\Http\Requests\CommentsRequest;
use App\Photo;
use App\Product;
use App\Role;
use App\Reply;
use Illuminate\Http\Request;


class AdminRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Reply::paginate(8);
//        return view('admin.replies.index',compact('replies'));

    }

    public function show($id)
    {
        $comments = Product::find($id)->comments;
        return view('admin.comments.replies.index',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role=Role::pluck('name','id')->all();

        return view('admin.replies.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Reply::findOrFail($id);
        $role=Role::pluck('name','id')->all();
        return view('admin.replies.edit',compact('reply','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        /* persisting data */
        $user = \Auth::user();
        $input = $request->all();
        $input['photo'] = $user->img;
        $input['name'] = $user->name;
        $input['email'] = $user->email;
        $comment->replies()->create($input);


        return \Redirect::to(\URL::previous() . "#reviews");

    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Reply::find($id);
        $comment->photo?deleteUpload($comment->photo->file):'';
        $comment->delete();
        return back()->with('success','xoa thanh cong');

    }
}
