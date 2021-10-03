<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function getPosts(Course $course)
    {
        return $course->posts()->with('comments')->get();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return false|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function createPost( Request $request , Course $course)
    {
        //
        return $course->posts()->save(new Post($request->all()));
    }




//     comments



    public function getComments(Post $post)
    {
        return $post->comments;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return false|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function createComment( Request $request , Post $post)
    {
        //
        return $post->comments()->save(new Comment($request->all()));
    }

}
