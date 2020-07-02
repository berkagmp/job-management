<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Job;
use Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class JobController extends Controller
{
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
    public function create(Request $request)
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
    public function update(Request $request, int $job_id)
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
    public function delete(int $job_id)
    {
        $job = Job::findOrFail($job_id);
        $job->delete();

        return response()->json(null, Response::HTTP_OK);
    }
}
