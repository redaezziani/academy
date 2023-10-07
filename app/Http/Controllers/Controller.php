<?php

namespace App\Http\Controllers;
use App\Models\recordcourses;
use App\Models\Livecourses;
use App\Models\Allrecord;

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
    public function RecordCourses()
    {

        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
            return view('record')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);

    }
    public function LiveCourses()
    {

        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
            return view('live')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);

    }
    public function LiveCourseWatche($id)
    {

        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        $namecourses = Livecourses::where('id', $id)->value('name');
        $allrecord = Allrecord::where('id-course', $id)->get();
            return view('livecourses')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('allrecord',$allrecord)->with('namecourses',$namecourses);

    }
    public function CourseWatche($id)
    {

        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        $allrecord = Allrecord::where('id', $id)->get();
        return view('courcewatche')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('allrecord',$allrecord);

    }


}
