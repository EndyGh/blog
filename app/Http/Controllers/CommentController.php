<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
   {

	$validator = Validator::make($request->all(), [
   	 'g-recaptcha-response' => 'required|captcha'
	]);

	 if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {

       $comment = new Comment();
       $comment->body =  $request->get('body');
       $comment->parent_id = (int) $request->get('parent_id');
       $comment->blog_id = (int) $request->get('blog_id');
       $comment->user_id = \Auth::user()->id;
       $comment->save();

       return redirect()->back();
     }
   }
}
