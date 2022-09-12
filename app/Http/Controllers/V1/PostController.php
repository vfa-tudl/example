<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\V1\PostsResource;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PostsResource::collection(Post::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $status = Post::create($request->all());
        return [
            "posts" => new PostsResource($status)
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return  view('post.show',[
            'post'=>$post,
        ]);
        // return $post -> author;
    }

    public function create(){
        return view('post.create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Models\Post $post)
    {

        // $status = $post->update($request->all());

        return [
            "status" => $status,
            "post" => $post
        ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Post::destroy($id);
        return [
            "status"=> $status
        ];
    }
    /**
     * Search the specified resource from storage.
     *
     * @param  string $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $status = Post::where('title','like','%'.$title.'%')->get();
        return [
            "status"=> $status
        ];
    }
}
