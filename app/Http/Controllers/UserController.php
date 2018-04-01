<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
{

    public function __construct()
    {
        //
    }


    public function addUser(Request $request) {

        $request['api_token'] = str_random(60);
        $request['password'] = app('hash')->make($request['password']);

        if($user = User::create($request->all())){
            return response()->json($user);
        }
        else{
            return response()->json('Eamil address exists already.');
        }


    }



    public function deleteUser($id){

        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return response()->json("Post Deleted Successfully");

    }

    public function updateUser(Request $request , $id){
        $user = User::find($id);
        $user->title = $request->input('title');
        $user->body = $request->input('body');
        $user->views = $request->input('views');

        return response()->json($user);
    }

    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function viewUser($id){
        $user = User::find($id);
        return response()->json($user);
    }

}
