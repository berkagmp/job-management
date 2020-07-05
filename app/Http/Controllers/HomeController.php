<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Job;
use App\Type;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home()
    {
        $jobs = JobResource::collection(Auth::user()->jobs()->with(['user:id,email,firstname,lastname', 'type'])->simplePaginate(10));
        // $jobs = Auth::user()->jobs()->get();
        // dd(Auth::user(), $jobs);
        $types = Type::all();

        return view('home')->with(['jobs' => $jobs, 'types' => $types]);
    }
}
