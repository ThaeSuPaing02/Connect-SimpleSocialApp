<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //Log::info('inside admin dashbarod controller');
        // if(!Gate::allows('admin')){
        //     abort(403);
        // }
        $this->authorize('admin');
        return view("admin.dashboard");
    }
}
