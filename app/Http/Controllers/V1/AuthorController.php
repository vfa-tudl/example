<?php

namespace App\Http\Controllers\V1;

// use App\Http\Requests\StoreAuthorRequest;

use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreAuthorRequest;
use App\Models\Author;
use App\Http\Resources\V1\AuthorsResource;
use App\Http\Controllers\Controller;
class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return AuthorsResource::collection(Author::all());
        
        return AuthorsResource::collection(Author::paginate()); //Split Pagination per page

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
     * @param  \App\Http\Requests\AuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
      
        // $request=array_merge(['user_id'=> auth()->user()->id],$request->all());
        // var_dump(auth()->user());
        $author= auth()->user()->Authors()->create($request->only([
            'date',
            'profile',
            'name',
            'avatar'
        ]));
        

        return new AuthorsResource($author);
        // return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
        return  new AuthorsResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        if(!$author){
            return [
                'status'=> $author                
            ];
        }
        $status = $author->update($request->all());

        return [
            "Status" => $status,
            "Author" => $author,
        ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
        $status = $author->delete();
        return [
            'status'=> $status
        ];
    }
}
