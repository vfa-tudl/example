<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Http\Resources\V1\JobResource;
use App\Http\Controllers\Controller;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return [
            "status"=> "E202",
            "data"=>JobResource::Collection(Job::all())->paginate(4),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        //
        $job = Job::create($request->all());

        return [
            "status"=>"E202",
            "message"=> $job,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job =Job::find($id);
        return [
            'status'=> "E202",
            "data" => $job,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, $id)
    {
        //
        $job = Job::findOrFail($id);
        $status = $job->update($request->all());

        return [
            "data" => $job,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $status = Job::destroy($id);
        return [
            "status"=> (bool)$status
        ];
    }


    public function search(Request $request)
    {
        // $data = Job::where('name','like','%'.$title.'%')
        //                ->where('Company','like','%'.$company.'%')->get();
        
        $param =$request->all();
        $data =Job::Filter($param);
        
        return [
            "status"=> "E202",
            "data"=> JobResource::Collection($data->get())->paginate(4)
        ];
    }
}
