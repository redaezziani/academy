<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                    class="absolute -top-2  -right-2 bg-emerald-400 text-slate-950 rounded-full px-1 text-xs"
                    >
                        2
                    </span>
                </div>
            </div>
        </nav>
        <main class="rtl hero  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
            <div class=" sidebar absolute gap-5  z-50 top-0 -right-[100vw] h-screen flex flex-col min-w-[300px] p-3 justify-start items-center bg-white ">
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
                <a>
                    <button id="recordbutton" onclick="hiderecord()"
                    class="bg-emerald-500 text-white  px-4 py-2 rounded-full"
                    >
                    دورات مباشرة
                    </button>
                    </a>
                    <a >
                    <button id="recordbutton" onclick="hidelive()"
                    class="bg-slate-500 text-white  px-4 py-2 rounded-full"
                    >
                    دورات مسجلة
                    </button>
                    </a>

                </div>

                <div id="divlive"  class="links overflow-auto flex w-full  flex-col justify-center items-center">
                    @foreach ($livecourses as $course)
                        <a href="" class="w-full hover:bg-slate-400/40 transition-colors ease-out duration-500 hover:border-l-2 hover:border-emerald-500   flex items-center justify-start  px-4 py-2 text-slate-600">
                        {{ $course->name }}
                        </a>
                    @endforeach
                </div>

                <div id="divrecord" style="display: none" class="links overflow-auto flex w-full  flex-col justify-center items-center">
                @foreach ($recordcourses as $course)

                        <a href="" class="w-full hover:bg-slate-400/40 transition-colors ease-out duration-500 hover:border-l-2 hover:border-emerald-500   flex items-center justify-start  px-4 py-2 text-slate-600">
                        {{ $course->name }}
                        </a>

                @endforeach
                </div>
            </div>
            <div class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200 flex justify-between items-center px-4 py-7">
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
                    class="  border-[1.4px]  border-slate-100 text-white  px-4 py-2 rounded-full"
                    >
                    <a href="/login">   تسجيل الدخول
                    </a>
                    </button>
                    <button
                    class="  border-[1.4px] border-emerald-500 text-white  px-4 py-2 rounded-full"
                    >
                    <a href="/register">
                        مستخدم جديد
                    </a>
                    </button>
                </div>
            </div>
            <section
            class="w-full z-10 flex flex-col justify-center items-start gap-5 mt-20 rtl px-5"
            >
            <h1
            class="text-4xl text-white font-semibold"
            >
            تعلم اليوم، لتَقُد غداً
            </h1>
            <p
            class="text-xl text-white/80"
            >
            تعلم.. طور.. وحقق نجاحك مع أكاديمية الرواد!
            </p>
            </section>
        </main>
        <section
        class="   w-full  rtl z-10 place-items-center justify-center items-center  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-4 bg-emerald-500 text-white min-h-[6rem] px-5 "
        >
        <div class="groupe mr-72  px-4 col-span-1 w-full flex items-center justify-start gap-1">
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
        <div class="groupe mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
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
        <div class="groupe mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
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
        class=" w-full flex  justify-start items-center"
        >
        <section
        class="w-1/2 relative h-full z-10  flex justify-between items-center gap-5 mt-20 rtl px-5"
        >
        <img src="{{asset('./images/cou.jpg')}}" class=" top-0 left-0 w-full h-full object-cover" alt="" srcset="">
        </section>
        <section
        class="w-1/2 relative h-full z-10  flex justify-between items-center gap-5 mt-20 rtl px-5"
        >
        <img src="{{asset('./images/home-live-bg2.jpg')}}" class=" top-0 left-0 w-full h-full object-cover" alt="" srcset="">
        </section>
        </main>
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
        }
function hiderecord() {
            var myElement = document.getElementById('divrecord');
            myElement.style.display = 'none';
            document.getElementById('divlive').style.display='block';
        }






    </script>
    </body>
</html>
