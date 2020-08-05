<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Timeline;
class TimelineController extends Controller
{
    public function index()
    {
        $timeline= Timeline::all();
        return view('frontend.timeline.index',compact('timeline'));
    }
}
