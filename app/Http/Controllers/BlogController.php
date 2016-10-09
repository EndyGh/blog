<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Like;
use App\Comment;

use App\Http\Requests;

class BlogController extends Controller
{

    /**
     * Instantiate a new BlogController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogs.new_blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();

        $blog->fill($request->all());
        $blog->slug = $request->get('title');
        $blog->user_id = $request->user()->id;
        $blog->author = $request->user()->name;
        $blog->save();

        return redirect()
            ->back()
            ->with('flash_msg','Blog was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        #$blog = Blog::where('slug','=',$slug)->first();
        #return view('blogs.show',compact('blog'));
        $blog = Blog::with([
            'comments',
            'likes',
            'parentComments.owner',
            'parentComments.allRepliesWithOwner'
        ]);

        return view('blogs.single_blog')->withBlog(
            $blog->where('slug',$slug)->first()
        );
    }

    public function likeBlog(int $id)
    {
        $like = new Like();
        $blog = Blog::find($id);

        $blog->likes()->save($like);

        return redirect()->back();
    }

    public function likeComment(int $id)
    {
        $like = new Like();
        $comment = Comment::find($id);

        $comment->likes()->save($like);

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
