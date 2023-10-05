<?php

namespace App\Http\Controllers;
use App\Models\recordcourses;
use App\Models\Livecourses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        return view('welcome')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);
    }
}
