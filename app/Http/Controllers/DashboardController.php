<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ideas = Idea::orderBy('created_at','desc')->get();
        return view('dashboard',compact('ideas'));
    }
}
