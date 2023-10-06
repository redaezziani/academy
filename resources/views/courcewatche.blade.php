<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            اكادمية المبتكر
        </title>
        <!-- Add the Swiper CSS -->


        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class=" font-cairo w-full  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">
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
        <main class="rtl hero-2  w-full flex flex-col justify-start items-center gap-3">
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
                @if (!auth()->check())
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
                </div>
                @else
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        <div class="btn-container flex items-center gap-2">
                            @csrf
                            <p
                                class=" rtl   text-white  px-4 py-2 rounded-md  transition-colors duration-300 ease-out">
                                مرحبا بك <span
                                class="text-emerald-500"
                                >{{ auth()->user()->name }}</span> في أكاديمية المهندس
                            </p>
                            <button type="submit"
                                class="  border-[1.4px] border-red-500 text-white  px-4 py-2 rounded-md hover:bg-red-500 transition-colors duration-300 ease-out">
                                تسجيل الخروج
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            @foreach ($allrecord as $items)
            <section
            class="w-full  z-10 flex flex-col justify-center items-center md:items-start gap-5 mt-20 rtl px-5"
            >
            <h1
            class="text-4xl text-white font-semibold"
            >
           {{$items->name}}
            </h1>
            <div class="informations rtl flex-col flex justify-start items-start gap-4 text-white/90">
                <p>
                مدة الدورة :
                <span
                class="text-emerald-500 mr-8"
                >
                   {{$items->time}}
                </span>
                الساعة
                </p>
                <div
                class="flex justify-center items-center gap-2 "
                >

                <p >
                  التدريب المتوفر :
                <div class="flex mr-2 justify-center items-center gap-2 ">
                    <span
                    class=" border-[1.4px] border-white  px-1 md:px-4 py-1 rounded-full   transition-colors duration-300 ease-out"
                    >
                    تدريب اونلاين
                    </span>
                </div>

                </p>
                </div>
                <div class="flex  justify-center items-center gap-2 ">
                    <p
                    class=""
                    >
                        السعر الكلي :
                    </p>
                    <div class="flex mr-4 justify-start items-center gap-2 ">
                        <span
                        class=" text-emerald-500"
                        >
                        {{$items->price}}

                        </span>
                        <span
                        class=" text-white"
                        >

                        دولار

                        </span>
                    </div>
                </div>
            </div>
            </section>
        </main>
        <section
        class="w-full bg-white py-2 md:flex-row flex-col   z-10 flex  justify-center items-start md:items-start gap-5  rtl px-5"
        >
        <div class=" w-full z-10  text-slate-600 md:w-[70%] mt-3 flex flex-col gap-4 justify-start items-start  ">
        <h1
        class="text-2xl text-slate-800 font-semibold"
        >
        {{$items->name}}

        </h1>
        <p>
        دورة تدريبية
        </p>
        <p>
            {{$items->desc1}}
        </p>
        </div>
        </section>
        @endforeach
        <section class="w-full bg-slate-50 py-2 z-10 flex flex-col justify-center items-center gap-5 rtl px-5">
    <div class="grid w-full  md:w-2/3 grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 ">
        <!-- Card max-w-[90%] 1 -->
        <div class="card max-w-[90%] rounded-md bg-white flex-col justify-between items-center gap-2 flex shadow-md w-full col-span-1 p-4">
            <img src="{{ asset('./images/exel.jpeg') }}" class="w-full h-40 md:h-28 rounded-md" alt="">
            <div class="text-content flex flex-col w-full justify-start items-start gap-2">
                <h1 class="text-xl text-slate-800 font-semibold">دورة تدريبية</h1>
                <p>دورة تدريبية</p>
                <p>دورة تدريبية</p>
            </div>
            <a class="w-full" href="">
                <button class="bg-emerald-500 text-white w-full px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out">احجز الدورة</button>
            </a>
        </div>

        <!-- Card max-w-[90%] 2 -->
        <div class="card max-w-[90%] rounded-md bg-white flex-col justify-between items-center gap-2 flex shadow-md w-full col-span-1 p-4">
            <img src="{{ asset('./images/exel.jpeg') }}" class="w-full h-40 md:h-28 rounded-md" alt="">
            <div class="text-content flex flex-col w-full justify-start items-start gap-2">
                <h1 class="text-xl text-slate-800 font-semibold">دورة تدريبية</h1>
                <p>دورة تدريبية</p>
                <p>دورة تدريبية</p>
            </div>
            <a class="w-full" href="">
                <button class="bg-emerald-500 text-white w-full px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out">احجز الدورة</button>
            </a>
        </div>

        <!-- Card max-w-[90%] 3 -->
        <div class="card max-w-[90%] rounded-md bg-white flex-col justify-between items-center gap-2 flex shadow-md w-full col-span-1 p-4">
            <img src="{{ asset('./images/exel.jpeg') }}" class="w-full h-40 md:h-28 rounded-md" alt="">
            <div class="text-content flex flex-col w-full justify-start items-start gap-2">
                <h1 class="text-xl text-slate-800 font-semibold">دورة تدريبية</h1>
                <p>دورة تدريبية</p>
                <p>دورة تدريبية</p>
            </div>
            <a class="w-full" href="">
                <button class="bg-emerald-500 text-white w-full px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out">احجز الدورة</button>
            </a>
        </div>
    </div>
    </section>
        <section
        class="w-full bg-white py-2   z-10 flex flex-col justify-center items-center md:items-start gap-5  rtl px-5"
        >

        <div class=" mt-3 flex flex-col w-full  gap-4 md:justify-start items-center md:flex-col justify-center md:items-center  ">
            <div class="group flex md:mr-20 flex-col gap-2 ">
                <div
                class="flex flex-col gap-2 w-72 justify-start items-start  "
                id='lottie'
                >
                </div>
                <button
            class="bg-emerald-500 text-white  px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out"
            >
            احجز الدورة
            </button>
            </div>
            <div class="grid w-1/2   bg-white z-10 h-28 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">

           </div>
        </div>

        </section>

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
            <img class="w-14" src="{{asset('./images/mastercard max-w-[90%]-2.svg')}}" alt="" srcset="">
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
<!-- Add the Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>

const animation = lottie.loadAnimation({
    container: document.getElementById('lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '{{ asset('animation_lneujon2.json') }}'
});

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
