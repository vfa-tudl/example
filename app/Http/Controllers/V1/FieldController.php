<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Http\Resources\V1\FieldResource;

class FieldController extends Controller
{
    //
    public function index(){
        return [
            "status"=> "E202",
            "data"=>(FieldResource::collection(Field::all()))->paginate(4),
        ]; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        //
        $field = Field::create($request->all());
        return [
            'data' => $field,
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
        //
        $field =Field::find($id);
        return [
            'status'=>"success",
            'data' => $field,
        ];
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $field = Field::findOrFail($id);
        $status = $field->update($request->all());

        return [
            "data" => $field,
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
        //
        $status = Field::destroy($id);
        return [
            "status"=> (bool)$status
        ];
    }
    
}
