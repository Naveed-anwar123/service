<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth',['only'=>['view']])
    }

    public function createPost(Request $request){

        $post = Post::create($request->all());
        return response()->json($post);

    }

    public function deletePost($id){

        $post = Post::find($id);
        if($post){
            $post->delete();
        }
        return response()->json("Post Deleted Successfully");

    }

    public function updatePost(Request $request , $id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');

        return response()->json($post);
    }

    public function index(){
        $posts = Post::all();
        return response()->json($posts);
    }

    public function viewPost($id){
        $post = Post::find($id);
        return response()->json($post);
    }


    //
}
