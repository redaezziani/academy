<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            اكادمية المبتكر
        </title>

        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('build/assets/app-fabb6531.css')}}"> 
        <link rel="stylesheet" href="{{asset('build/assets/app-40e921f0.css')}}">        
        <script src="{{asset('build/assets/app-06e4cb5c.js')}}"></script>  
    </head>
    <body class=" w-full font-cairo  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">
        <nav
        class="w-full bg-white flex border-b-[1.4px] justify-between z-50 fixed top-0 items-center px-10 py-4"
        >
            <div class="logo">
                <img
                src="{{asset('./images/pifoneerstec.png')}}"
                alt="logo"
                class="w-10"
                >
            </div>
            <div class="cart cursor-pointer flex justify-center items-center relative">
                <i
                class="fas fa-shopping-cart text-xl text-slate-400"
                >
                </i>
                <div class="products-count">
                    <span
                    class="absolute -top-2  -right-2 bg-emerald-400 text-slate-950 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out px-1 text-xs"
                    >
                        2
                    </span>
                </div>
            </div>
        </nav>
        <main class="rtl hero-3  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
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
                <div class="btn-container  flex items-center gap-2">
                    <button
                    class="  border-[1.4px]  border-slate-100 text-white  px-4 py-2 rounded-md hover:bg-white/25 transition-colors duration-300 ease-out"
                    >
                    <a href="/login">   تسجيل الدخول
                    </a>
                    </button>
                    <button
                    class="  border-[1.4px] border-emerald-500 text-white  px-4 py-2 rounded-md hover:bg-emerald-500 transition-colors duration-300 ease-out"
                    >
                    <a href="/register">
                        مستخدم جديد
                    </a>
                    </button>
                </div>
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        <div class=" relative w-80   justify-center flex items-center gap-2">
                            @csrf
                            <div
                            id="menu-avatar"
                            class="menu w-10 cursor-pointer justify-center  items-center flex overflow-hidden h-10 rounded-full bg-slate-300">
                                <img
                                src="{{asset('./images/photo-1534528741775-53994a69daeb.jpg')}}"
                                alt="" srcset="">
                            </div>
                            <div
                            id="menu"
                            class="items hidden top-14 left-28 md:left-0  gap-2  absolute p-2 rounded-md min-h-[8rem] bg-white flex-col justify-center items-center text-slate-400 ">
                            <p
                                class=" rtl px-4 py-2 rounded-md  transition-colors duration-300 ease-out">
                                مرحباً 
                                  {{ auth()->user()->name }} 
                            </p>
                            <hr
                            class="w-full"
                            >
                            <button type="submit"
                                class="  text-red-500 mt-3   px-4 py-2 rounded-md hover:text-red-700 transition-colors duration-300 ease-out">
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
            class=" text-3xl md:text-5xl text-white font-semibold"
            > طور مهاراتك

            </h1>
            <p
            class=" text-3xl md:text-5xl flex justify-center items-centerx text-white/80"
            >
            وأنت
            <span
            class='text-emerald-500 '
            >
            في مكانك!
            </span>
            </p>
            <p
            class="  md:text-xl text-white"
            >
            تعلم عن بعد... وتميز بشهادات
                <b
                class=""
                >
                معتمدة دولية
                </b>
            </p>
            <p
            class=' md:text-xl text-white'
            >
            أكثر من
            <span
            class='text-emerald-500'
            >
            50
            </span>
            دورة في مختلف التخصصات الأكثر طلباً
            </p>
            <p
            class="text-xl text-white"
            >
            محلياً وعالمياً!
            </p>
            </section>

        </main>

        <section
        class="   w-full  rtl z-10 place-items-center justify-center items-center  grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-4 bg-emerald-500 text-white min-h-[6rem] px-5 ">
        <div class="groupe lg:mr-72  px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/speech-bubble.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                معتمدون دولياً
                </h2>
                <p
                class=" text-white/80"
                >
                مركز تدريب واختبار معتمد
                </p>
            </div>
        </div>
        <div class="groupe lg:mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/lightbulb.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                مدربون محترفون
                </h2>
                <p
                class=" text-white/80"
                >
                ذوي كفاءة عالية ومعتمدون دوليأ
                </p>
            </div>
        </div>
        <div class="groupe lg:mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/medal.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                تنوع في التدريب
                </h2>
                <p
                class=" text-white/80"
                >
                عن بعد (مباشر) – قاعة دراسية
                </p>
            </div>
        </div>
        </section>
        <main
        class=" w-full rtl grid py-3 z-10 bg-slate-700 min-h-[15rem] md:px-20 px-6  grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 "
        >
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-one.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            مكان  لإدارة جميع أمورك الأكاديمية والمالية
            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-two.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
             خيارات متعددة للدفع
             تدعم الدفع الإلكتروني
            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-three.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            سلسلة من الدروس المسجلة التي تم طرحها خلال الدورة
            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-four.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            فريق عمل متخصص بتقديم المساعدة
            (الدعم الفني)
            </h2>
        </div>
        </main>
        <div class="w-full rtl flex flex-col z-10 gap-2 justify-center items-center min-h-[30rem] px-6 md:px-40 py-4 bg-slate-50">
            <div class=" mt-8  w-full text-center md:w-2/3">
                <h1
                class="text-4xl text-emerald-500 font-semibold"
                >
                تصفح الدورات التدريبية
                </h1>
                <h2
                class="text-xl mt-3 text-slate-600 font-semibold"
                >
                اختر الدورة التدريبية التي ترغب في الالتحاق بها
                </h2>
            </div>
            <div class="grid mt-8  gap-x-5 gap-y-4 w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($livecourses as $course)
                <a href="/LiveCourses/Course/{{$course->id}}">
                <div class="card w-full bg-white shadow-sm rounded-sm min-h-[6rem] p-2 flex max-w-[24rem] justify-start items-center gap-2">
                    <img src="{{ asset('./images/' . $course->image) }}" alt="logo" srcset="" class="w-16" >
                    <p
                    class="text-slate-600 text-xl font-semibold"
                    >
                    {{$course->name}}
                    </p>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    <footer
    class="w-full z-10 flex px-16 min-h-[20rem] border-t-2 border-emerald-400 items-center justify-start gap-5 flex-col bg-slate-800 text-white py-5"
    >
    <div class="w-full rtl flex border-b py-2 border-slate-400 justify-between items-center ">
        <img src="{{asset('./images/pifoneerstec.png')}}" alt="logo" class="w-10" srcset="">
        <div class="groupe flex justify-center items-center gap-2">
            <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
            <img class="w-14" src="{{asset('./images/visa.svg')}}" alt="" srcset="">
            </div>

            <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
            <img class="w-14" src="{{asset('./images/mastercard-2.svg')}}" alt="" srcset="">
            </div>

            <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
            <img class="w-14" src="{{asset('./images/paypal.svg')}}" alt="" srcset="">
            </div>
        </div>
    </div>
    <div class="informations flex-wrap mt-2 rtl w-full  flex justify-start items-center ">
        <div class="group-1 w-full md:w-2/3 gap-2 flex flex-col justify-start items-start">
            <h2
            class="text-xl text-white font-semibold"
            >
            تبحث عن تدريب
            </h2>
            <p
            class="text-white/80 text-sm"
            >
            مهما كانت الدورة التدريبية التي تبحث عنها! تقدم أكاديمية المبتكر
             مجموعة واسعة من الدورات التدريبية والدبلومات في مجالات مختلفة، مثل الإدارة, المحاسبة, التسويق, التصميم الجرافيكي, الهندسة, البرمجة, الشبكات, واللغات. قم بتنزيل كتيبات الدورات الآن!
            </p>
        </div>
    </div>
    </footer>
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
