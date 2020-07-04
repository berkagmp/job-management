<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Job;
use App\Type;

class HomeController extends Controller
{
    function home()
    {
        $jobs = JobResource::collection(Job::with(['user:id,email,firstname,lastname', 'type'])->simplePaginate(10));
        $types = Type::all();

        return view('home')->with(['jobs' => $jobs, 'types' => $types]);
    }
}
