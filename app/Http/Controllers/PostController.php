<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function addPost()
    {
        $post = new Post();
        $post->name = "Post 1";
        $post->body = "This is post 1";
        $post->save();
        return "Post has been created";
    }

    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "This is fourth comment.";
        $post->comment()->save($comment);
        return "Comment has been posted";
    }

    public function getCommentByPost($id)
    {
        $comment = Post::find($id)->comment;

        return $comment;
    }
}
