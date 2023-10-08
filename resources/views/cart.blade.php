<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{asset('./images/x.jpg')}}">
        <title>
            اكادمية المبتكر
        </title>

        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        @vite('resources/css/app.css')
    </head>
    <body class=" w-full  font-cairo overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

        @include('navbar')

        <main class="rtl hero-5  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/60"></div>
            <div class=" sidebar fixed shadow-md gap-5  z-50 top-0 -right-[100vw] h-screen flex flex-col min-w-[300px] p-3 justify-start items-center bg-white ">
                <div class="cancel flex w-full justify-between  items-center ">
                    <h3
                    class="text-slate-500 text-xl font-semibold"
                    >
                    إبدأ رحلة التعلم
                    </h3>
                    <i
                    onclick="remove()"
                    class="fas fa-times text-slate-500 text-xl cursor-pointer"
                    >
                    </i>
                </div>
                <div class="btn-container mt-5 flex gap-2 w-full items-center justify-center">

                    <a >
                    <button onclick="hiderecord()" id="livebutton"
                    class="bg-slate-500 text-white  px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out btn-active"
                    >
                    دورات مباشرة
                    </button>
                    </a>
                </div>

                <div id="divlive"  class="links overflow-auto flex w-full  flex-col justify-center items-center">
                    @foreach ($livecourses as $course)
                        <a href="/LiveCourses/Course/{{$course->id}}"
                        class="w-full hover:bg-slate-400/40 transition-colors ease-out duration-500 hover:border-l-2 hover:border-emerald-500   flex items-center justify-start  px-4 py-2 text-slate-600">
                        {{ $course->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200  flex justify-between  gap-4 items-center flex-row   px-4 py-4">
                <div
                onClick="add()"
                class="menu hover:text-emerald-400  ease-in-out duration-300 transition-all  text-2xl cursor-pointer text-white flex justify-center items-center gap-2">
                    <i
                    class="fas fa-bars  "
                    >
                    </i>
                    المواضيع
                </div>

                @if (!auth()->check())
                <div class=" relative  justify-center flex items-center gap-2">
                            @csrf
                            <div
                            id="menu-avatar"
                            class="menu w-10 cursor-pointer justify-center  items-center flex overflow-hidden h-10 rounded-full bg-slate-300">
                                <img
                                src="{{asset('./images/Unknown_person.jpg')}}"
                                alt="" srcset="">
                            </div>
                            <div
                            id="menu"
                            class="items hidden top-14 left-7  w-[10rem] text-center  gap-2  absolute p-2 rounded-md min-h-[5rem] bg-white flex-col justify-center items-center text-slate-400 ">
                            <button
                    class="    text-slate-400  px-4 py-2 rounded-md hover:text-slate-300 transition-colors duration-300 ease-out"
                    >
                    <a
                    class="text-slate-600 "
                    href="/login">   تسجيل الدخول
                    </a>
                    </button>
                            <hr
                            class="w-full"
                            >
                            <button
                    class="  text-emerald-500  py-2 rounded-md text:bg-emerald-500 transition-colors duration-300 ease-out"
                    >
                    <a href="/register">
                        مستخدم جديد
                    </a>
                    </button>
                            </div>
                    </div>
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        <div class=" relative    justify-center flex items-center gap-2">
                            @csrf
                            <div
                            id="menu-avatar"
                            class="menu w-10 cursor-pointer justify-center  items-center flex overflow-hidden h-10 rounded-full bg-slate-300">
                                <img
                                src="{{asset('./images/3d-avatar-profession-as-graduate-student-3d-model-fcc1f1114a.jpg')}}"
                                alt="" srcset="">
                            </div>
                            <div
                            id="menu"
                            class="items hidden top-14 left-7  w-[10rem] text-center  gap-2  absolute p-2 rounded-md min-h-[8rem] bg-white flex-col justify-center items-center text-slate-400 ">
                            <p
                                class=" rtl px-4 py-2 rounded-md  transition-colors duration-300 ease-out">
                                مرحباً
                                  {{ auth()->user()->name }}
                            </p>
                            <hr
                            class="w-full"
                            >
                            <button  class="  text-red-500 mt-3 py-2 rounded-md hover:text-red-700 transition-colors duration-300 ease-out">
                                تسجيل الخروج
                            </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
            <section
            class="w-full  z-10 flex flex-col justify-center items-center md:items-start gap-5 mt-20 rtl px-5"
            >
            <h1
            class="text-4xl text-center md:text-start text-white font-semibold"
            >
            سلة المشتريات 
            </h1>
            <div
            class=' flex min-w-[10rem] justify-start items-center gap-2'
            >
                <div
                class=' h-8 w-8 p-1 border-r-2 border-yellow-400'
                >
                    <i>

                    </i>
                </div>
                <div class="content ">  
                <h1>
                    محتويات السلة <span class=' text-yellow-400'> 1</span>
                </h1>
                </div>
            </div>

            <div
            class=' flex max-w-[14.5rem] text-sm justify-start items-center gap-2'
            >
                <div
                class=' h-8 w-8 p-1  text-yellow-400'
                >
                    <i>

                    </i>
                </div>
                <div class="content text-white/80">  
                <h1>
                    يتوجب عليك <a href="" class=' text-white'>تسجيل الدخول </a> لتتمكن من  اتمام عملية الشراء
                </h1>
                </div>
            </div>
            </section>
        </main>
        <div class="w-full px-4 z-10 bg-white rtl flex justify-start items-start gap-4 flex-col py-5">
            <p
            class=" text-slate-500"
            >
               السعر الاجمالي هو : <span class=' text-emerald-500 '>40</span>دولار  
            </p>
        </div>
        <div class="w-full bg-white z-10 rtl px-4 py-4 flex-col gap-7 justify-start items-start  ">
            <h1
            class=' text-slate-800'
            >
            محتويات  السلة :
            </h1>
            <div class="item  flex justify-start w-full items-center gap-2 text-slate-500">
                <button class="icon w-8 h-8 rounded-md bg-red-600 text-cyan-50">
                    <i
                    class='fa'
                    >

                    </i>
                </button>
                <div class="content flex justify-start items-start gap-2 flex-col ">
                  <p>
                  علم البيانات باستخدام بايثون     
                  </p>
                <p
                class=' text-slate-400 text-sm'
                >
                    450 دولار
                </p>
                </div>
                
            </div>

            <div class="item  flex justify-start w-full items-center gap-2 text-slate-500">
                <button class="icon w-8 h-8 rounded-md bg-red-600 text-cyan-50">
                    <i
                    class='fa'
                    >
                    </i>
                </button>
                <div class="content flex justify-start items-start gap-2 flex-col ">
                  <p>
                  تطوير تطبيقات الهاتف باستخدام برنامج Flutter     
                  </p>
                <p
                class=' text-slate-400 text-sm'
                >
                    57 دولار
                </p>
                </div>
                
            </div>

            <div class="item  flex justify-start w-full items-center gap-2 text-slate-500">
                <button class="icon w-8 h-8 rounded-md bg-red-600 text-cyan-50">
                    <i
                    class='fa'
                    >

                    </i>
                </button>
                <div class="content flex justify-start items-start gap-2 flex-col ">
                  <p>
                    المحادثة باللغة الإنجليزية      
                  </p>
                <p
                class=' text-slate-400 text-sm'
                >
                    120 دولار
                </p>
                </div>
                
            </div>

            <!-- end items  -->
            <hr
            class='w-72 mt-2'
            >
            <p
            class=' mt-2 text-slate-700'
            >
              المجموع الكلي لمشترياتك هو 30 دولار  
            </p>
            <button
            class=' mt-3 text-white bg-emerald-500 rounded-md px-3 py-2'
            >
            الدفع الان
            </button>
        </div>
        @include('footer')


<script>

let  menuAvatar=document.getElementById('menu-avatar');
let menuDrop=document.getElementById('menu');


menuAvatar.addEventListener('click',()=>{
    menuDrop.classList.toggle('hidden');
})
let menu=document.getElementById('menu');
let cancel=document.getElementById('cancel');
let sidebar=document.querySelector('.sidebar');


function add(){
    sidebar.classList.toggle('active');
}
function remove(){
    sidebar.classList.toggle('active');
}

function hidelive() {
            var myElement = document.getElementById('divrecord');
            myElement.style.display = 'block';
            document.getElementById('divlive').style.display='none';
            document.getElementById('recordbutton').classList.add("btn-active");
            document.getElementById('livebutton').classList.remove("btn-active");
        }
function hiderecord() {
            var myElement = document.getElementById('divrecord');
            myElement.style.display = 'none';
            document.getElementById('divlive').style.display='block';
            document.getElementById('livebutton').classList.add("btn-active");
            document.getElementById('recordbutton').classList.remove("btn-active");

        }
    </script>
    </body>
</html>
