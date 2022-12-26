<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AdminPostsController extends Controller
{
    public function index()
    {
         $posts = Post::orderBy('id', 'DESC')->get();//取得資料庫中的欄位值，以陣列的方式
         $data=[
             'posts'=>$posts
         ];

        return view('admin.posts.index',$data);
    }

    public function create()
    {

        return view('admin.posts.create');
    }

    public function store(Request $request) //Request 作為提示型別的功能
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $data=[
            'post'=>$post,
        ];
        return view('admin.posts.edit',$data);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
