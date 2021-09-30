<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id=null)
    {
        $user = User::with('posts.comments.user')
        ->where('id',$id)
        ->get();
        // echo $user;
        // die;
        return view('profile',['user'=>$user]);
    }

    public function update_user(Request $data){
        User::where('id', '=', $data->id)
        ->update(['name' => $data->name, 'email' => $data->email]);
    }

    public function manage_users(){
        $all = User::with('posts.comments')->get();
        return view('manage', ["users" => $all]);
    }

    public function make_admin($id){
        User::where('id', '=', $id)
        ->update(['is_admin' => 1]);
        return back();
    }

    public function delete_user($id){
        User::where('id', '=', $id)
        ->delete();
        DB::table('posts')
        ->where('user_id','=',$id)
        ->delete();
        DB::table('comments')
        ->where('user_id','=',$id)
        ->delete();
        return back();
    }
}
