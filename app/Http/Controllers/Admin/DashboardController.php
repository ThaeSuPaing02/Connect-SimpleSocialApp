<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //Log::info('inside admin dashbarod controller');

        return view("admin.dashboard");
    }
}
