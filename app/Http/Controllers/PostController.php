<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function post(){
        $post = Post::with('comments.user')
        ->orderBy('id', 'DESC')
        ->take(20)
        ->get();
        return view('home' , ['posts' => $post]);
    }

    public function create_post(Request $data, $id){
        Post::create([
            'user_id' => $id,
            'text' => $data->text,
        ]);
        return back();
    }

    public function delete_post($id){
        DB::table('posts')->where('id', '=', $id)->delete();
        DB::table('comments')->where('post_id', '=', $id)->delete();
        return redirect('/home');
    }
}
