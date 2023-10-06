<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            اكادمية المهندس
        </title>

        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class=" w-full  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">
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
        <main class="rtl hero-4 bg-emerald-800  relative w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
            <img class=" w-56 h-full transform rotate-180  z-0 absolute right-0 -bottom-36"
            src="{{asset('./images/Ornament 69.svg')}}"
            />
            <img class=" w-56 h-full  z-0 absolute left-0 top-8"
            src="{{asset('./images/Ornament 69.svg')}}"
            />

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
            <div class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200 flex md:justify-between justify-start gap-4  items-start md:items-center md:flex-row flex-col  px-4 py-7">
                <div
                onClick="add()"

                class="menu hover:text-emerald-400  ease-in-out duration-300 transition-all  text-2xl cursor-pointer text-white flex justify-center items-center gap-2">
                    <i
                    class="fas fa-bars  "
                    >
                    </i>
                    المواضيع
                </div>
                <div class="btn-container flex items-center gap-2">
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
                    {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
                </div>
            </div>
            <section
            class="w-full  z-10 flex flex-col justify-center items-center  gap-5 mt-20 rtl px-5"
            >
            <h1
            class="text-5xl text-white font-semibold"
            >
            {{$namecourses}}
            </h1>
            <p
            class=" text-emerald-500 text-5xl"
            >
            تدريب مباشر
            </p>
            </section>

        </main>
        <div class="w-full flex rtl bg-white z-10 justify-center items-center ">
            <div class="text flex justify-center flex-col items-center gap-2 ">
                <h2
                class="text-3xl text-slate-400 font-semibold"
                >
                دورات
                </h2>
                <p
                class="text-xl text-emerald-500/80 font-semibold"
                >
                مباشرة
                </p>
            </div>
        </div>
        <main
        class="w-full py-4  z-10 flex flex-col bg-white justify-center items-center  gap-5 rtl px-5"
        >
        <h1
        class="text-5xl mt-16 text-slate-400 font-semibold"
        >
        دورات مباشرة
        </h1>
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3
        ">
        @foreach ($allrecord as $items)
        <div class="card flex py-3 mt-5 w-full bg-slate-100 shadow-md rounded-md col-span-1 flex-col  justify-center items-center">
            <img
            class="w-1/2 rounded-md max-h-30 object-cover" style="height:40%; backround-size:cover"
            src="{{asset('./images/'.$items->image)}}"
            alt="" srcset="">
            <div class="text-content flex justify-center items-center gap-2 flex-col ">
                <p class="mt-4">
                {{$items->langue}}
                <i
                class="fas fa-circle text-emerald-500 text-xs"
                >

                </i>
                </p>
                <p
                class="text-xl text-slate-500 font-medium"
                >
                {{$items->name}}
                </p>
                <p
                class="text-xl text-slate-400 font-medium "
                >
                {{$items->time}} ساعة
                </p>
                <a href="">
                <button
                class="bg-emerald-500 text-white  px-4 py-2 mb-4 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out"
                >
                    تفاصيل الدورة
                </button>
                </a>
            </div>
        </div>
        @endforeach
        </div>
        </main>
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
            مهما كانت الدورة التدريبية التي تبحث عنها! تقدم أكاديمية المهندس مجموعة واسعة من الدورات التدريبية والدبلومات في مجالات مختلفة، مثل الإدارة, المحاسبة, التسويق, التصميم الجرافيكي, الهندسة, البرمجة, الشبكات, واللغات. قم بتنزيل كتيبات الدورات الآن!
            </p>
        </div>
    </div>
    </footer>
        <script>
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
