<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Job;
use Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class JobController extends ResponseController
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create a job
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    function create(Request $request)
    {
        $validator = Validator::make($request->all(), Job::$validation_rule);

        if ($validator->fails()) {
            flash()->error($this->validationErrorsToString($validator->errors()));
            return redirect()->back();
        }

        $job = Job::create($request->all());

        flash()->success("Job Created");
        return redirect()->back();
    }

    /**
     * Update a job
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), Job::$validation_rule);

        if ($validator->fails()) {
            flash()->error($this->validationErrorsToString($validator->errors()));
            return redirect()->back();
        }

        $job = Job::findOrFail($request->get('id'));
        $job->update($request->all());

        flash()->success("Job Updated");
        return redirect()->back();
    }

    /**
     * Delete a job
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse redirect
     */
    function delete(Request $request)
    {
        error_log($request->get('id'));
        $job = Job::findOrFail($request->get('id'));
        $job->delete();

        flash()->success("Job Deleted");
        return redirect()->back();
    }

    /**
     * Return list of jobs
     *
     * @return array
     */
    public function list()
    {
        return JobResource::collection(Job::with(['user:id,email,firstname,lastname', 'type'])->paginate());
    }

    /**
     * Return a job
     *
     * @param int $job_id
     * @return \App\Job
     */
    public function get(int $job_id)
    {
        return Job::findOrFail($job_id);
    }

    /**
     * Create a job
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function api_create(Request $request)
    {
        $validator = Validator::make($request->all(), Job::$validation_rule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $job = Job::create($request->all());

        return response()->json($job, Response::HTTP_CREATED);
    }

    /**
     * Update a job
     *
     * @param \Illuminate\Http\Request $request
     * @param int $job_id
     * @return mixed
     */
    public function api_update(Request $request, int $job_id)
    {
        $validator = Validator::make($request->all(), Job::$validation_rule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $job = Job::findOrFail($job_id);
        $job->update($request->all());

        return response()->json($job, Response::HTTP_OK);
    }

    /**
     * Delete a job
     *
     * @param int $job_id
     * @return mixed
     */
    public function api_delete(int $job_id)
    {
        $job = Job::findOrFail($job_id);
        $job->delete();

        return response()->json(null, Response::HTTP_OK);
    }
}
