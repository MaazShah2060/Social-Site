<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function add_comment(Request $data, $id){
        Comment::create([
            'post_id' => $id,
            'user_id' => $data->user_id,
            'comment' => $data->comment,
        ]);
        return back();
    }

    public function delete_comment($id){
        DB::table('comments')
        ->where('id', '=', $id)
        ->delete();
        return back();
    }
}
