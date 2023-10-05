<?php

namespace App\Http\Controllers;
use App\Models\recordcourses;
use App\Models\Livecourses;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function welcome()
    {

            $recordcourses = recordcourses::all();
            $livecourses = Livecourses::all();
            return view('welcome')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);
        }

    }


