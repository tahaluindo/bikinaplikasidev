<?php

namespace App\Http\Controllers;

use App\FailedJob;
use Illuminate\Http\Request;

class FailedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['failed_jobs'] = FailedJob::paginate(100);

        return view('failed_job.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('failed_job.create');
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
        $this->validate($request, [

        ]);

        return redirect()->route('failed_job.index')->with("success", "Berhasil menambah failed_job");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FailedJob  $failed_job
     * @return \Illuminate\Http\Response
     */
    public function show(FailedJob $failed_job)
    {
        //
        $data['failed_job'] = $failed_job;

        return view('failed_job.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FailedJob  $failed_job
     * @return \Illuminate\Http\Response
     */
    public function edit(FailedJob $failed_job)
    {
        //
        $data['failed_job'] = $failed_job;

        return view('failed_job.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FailedJob  $failed_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FailedJob $failed_job)
    {
        //
        $this->validate($request, [

        ]);

        return redirect()->route('failed_job.index')->with("success", "Berhasil mengupdate FailedJob");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FailedJob  $failed_job
     * @return \Illuminate\Http\Response
     */
    public function destroy(FailedJob $failed_job)
    {
        //
        $failed_job->delete();

        return redirect()->route('failed_job.index')->with("success", "Berhasil menghapus Failed Job");
    }
}
