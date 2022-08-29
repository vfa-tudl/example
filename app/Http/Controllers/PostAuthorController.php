<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostAuthorRequest;
use App\Http\Requests\UpdatePostAuthorRequest;
use App\Models\PostAuthor;

class PostAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePostAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostAuthor  $postAuthor
     * @return \Illuminate\Http\Response
     */
    public function show(PostAuthor $postAuthor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostAuthor  $postAuthor
     * @return \Illuminate\Http\Response
     */
    public function edit(PostAuthor $postAuthor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostAuthorRequest  $request
     * @param  \App\Models\PostAuthor  $postAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostAuthorRequest $request, PostAuthor $postAuthor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostAuthor  $postAuthor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostAuthor $postAuthor)
    {
        //
    }
}
