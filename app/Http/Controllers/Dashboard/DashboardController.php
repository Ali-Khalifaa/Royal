<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\User;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alladmissions = Admission::count();
        $male = Admission::where('gender','male')->count();
        $female = Admission::where('gender','female')->count();
        $approved = User::where('accepted','=',1)->count();

        return view('dashboard.index',compact('alladmissions','male','female','approved'));
    }
   

  

    
}
