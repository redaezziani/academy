<?php

namespace App\Http\Controllers;
use App\Models\Addtocart;
use App\Models\recordcourses;
use App\Models\Livecourses;
use App\Models\Allrecord;
use App\Models\desccourse;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PayTabs\PayTabs;
use Paytabscom\Laravel_paytabs\PaytabsApi;

class Controller extends BaseController
{
    public function welcome()
    {
        // get number of course in cart
        if(auth()->check())
        {
            $count = Addtocart::where('userid', auth()->user()->id)->count();
        }
        else
        {
            $count = 0;
        }
        //
            $recordcourses = recordcourses::all();
            $livecourses = Livecourses::all();
            return view('welcome')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

        }
    public function RecordCourses()
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
          }
          else
          {
              $count = 0;
          }
          //
        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
            return view('record')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

    }
    public function LiveCourses()
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
          }
          else
          {
              $count = 0;
          }
          //
        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
            return view('live')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

    }
    public function LiveCourseWatche($id)
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
          }
          else
          {
              $count = 0;
          }
          //
        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        $namecourses  = Livecourses::where('id', $id)->select('name', 'name_en')->first();
        $allrecord = Allrecord::where('id-course', $id)->get();
            return view('livecourses')->with('recordcourses',$recordcourses)->with('count',$count)->with('livecourses',$livecourses)->with('allrecord',$allrecord)->with('namecourses',$namecourses);

    }
    public function CourseWatche($id)
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
          }
          else
          {
              $count = 0;
          }
          //
        $desc1 = desccourse::where('idrecord', $id)->where(function($query) {$query->where('desc1', '<>', '')->orWhere('desc1_en', '<>', '');}) ->get();
        $desc2 = desccourse::where('idrecord',$id)->where('desc2', '<>', '')->get();
        $randomColumns = DB::table('allrecords')->inRandomOrder()->take(3)->get();
        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        $allrecord = Allrecord::where('id', $id)->get();
        return view('courcewatche')->with('desc1',$desc1)->with('desc2',$desc2)->with('count',$count)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('allrecord',$allrecord)->with('randomColumns',$randomColumns);

    }
    public function Cart()
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
              $items=Addtocart::where('userid',auth()->user()->id)->get();
              $some=Addtocart::where('userid',auth()->user()->id)->sum('price');
          }
          else
          {     $items= [];
                $count = 0;
                $some=0;
          }


        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        return view('cart')->with('some',$some)->with('count',$count)->with('items',$items)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);

    }
    public function AddToCart(Request $request,$id)
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
          }
          else
          {
              $count = 0;
          }
          //
        if(auth()->check()){
            $couseselect = Allrecord::find($id);
            $id_user=auth()->user()->id;
            $cart=new Addtocart;
            $cart->name=$couseselect->name;
            $cart->name_en=$couseselect->name_en;
            $cart->userid=$id_user;
            $cart->price=$couseselect->price;
            $cart->image=$couseselect->image;
            $cart->save();
            $recordcourses = recordcourses::all();
            $livecourses = Livecourses::all();
            return redirect()->back()->with('count',$count)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('message','azerty');

        }
        else
        {

            return redirect('login');

        }
    }

    public function RemoveFromCart($id){
        $item= Addtocart::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function createPayment(Request $request)
    {
        $response = PayTabs::create_pay_page(array(
            "merchant_email" => "merchant@example.com",
            "secret_key" => "your_secret_key",
            "currency" => "USD",
            "amount" => 100,
            "title" => "Test Payment",
            "order_id" => "12345",
            "customer_details" => array(
                "name" => "John Doe",
                "email" => "john@example.com",
                "phone_number" => "+1234567890",
            ),
        ));

        return view('payment.create', compact('response'));
    }

}
