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
        <link rel="stylesheet" href="{{asset('build/assets/app-fabb6531.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/app-40e921f0.css')}}">
        <script src="{{asset('build/assets/app-06e4cb5c.js')}}"></script>
    </head>
    <body class=" w-full  font-cairo overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

        <nav
        class="w-full bg-white flex border-b-[1.4px] justify-between z-50 fixed top-0 items-center px-10 py-4"
        >
            <div class="logo">
                <a
                href="/"
                >
                <img
                src="{{asset('./images/19d7f5fbae4ea.jpg')}}"
                alt="logo"
                class="w-14"
                >
                </a>
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
        <main class="rtl hero  w-full flex flex-col justify-start items-center gap-3">
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
                    class="    text-slate-200  px-4 py-2 rounded-md hover:text-slate-300 transition-colors duration-300 ease-out"
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
            class="text-4xl text-white font-semibold"
            >
            تعلم اليوم، لتَقُد غداً
            </h1>
            <p
            class="text-xl text-white/80"
            >
             تعلم.. طور.. وحقق نجاحك مع أكاديمية  المبتكر
            </p>
            </section>
        </main>
        <section
        class="   w-full  rtl z-10 place-items-center justify-center items-center  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-4 bg-emerald-500 text-white min-h-[6rem] px-5 ">
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
        class=" w-full flex-wrap  rtl border-t-2 border-emerald-500  flex bg-white z-10 lg:py-3  justify-center items-center"
        >
        <div class=" w-full  sm:w-3/4 relative  h-fit flex justify-center min-h-[30rem] md:max-h-0  items-center">
            <img src="{{asset('./images/pexels-vlada-karpovich-4050415.jpg')}}" class="w-full lg:rounded-md overflow-hidden  h-full absolute top-0 inset-0 z-0 left-0" alt="" srcset="">
            <div class="text-content px-8 flex justify-center items-center gap-4 flex-col z-10">
                <h2
                class="md:text-4xl text-2xl  font-semibold text-white"
                >نظام التعلم عن بعد</h2>
                <p
                class="md:text-xl text-sm text-emerald-500/80"
                >بخاصية البث المباشر</p>
                <p
                class='md:text-xl text-sm text-center text-white/80'
                >
                يمكنك الإلتحاق بالدورات التي تعقد في الأكاديمية دون الحاجة للتواجد داخل القاعة التدريبية
                </p>
                <a href="/LiveCourses">
                    <button
                    class=" bg-emerald-400 text-white  px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out"
                    >
                    اعرف المزيد
                    </button>
                </a>
            </div>
        </div>
    </main>
    <div class="w-full rtl z-10 py-2 bg-slate-100 min-h-[24rem] flex justify-center flex-col gap-3 items-center">
        <h1
        class="text-4xl text-center text-slate-800 font-semibold"
        >
        آراء <span
        class="text-emerald-500"
        >العملاء</span>
        </h1>
        <div class="grid grid-cols-1 place-items-center w-full  px-6 mt-3 sm:grid-cols-2 md:grid-cols-3 gap-4 ">
            <div class="card h-[17rem] rtl line-clamp-4  bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-6 "
                >
                نتقدم بخالص الشكر ووافر التقدير على ما تبذلونه من جهود مثمرة ومتواصلة فيما يتعلق بالدورات التدريبية التي قدمت لموظفي شركة كراون الشرق الأوسط لصناعة العبوات لافتين النظر الى اسلوبكم البسيط والعملي في ايصال المعلومة وحرصكم على بلوغ الاستفادة القصوى منها  .
                </p>
                <div class="content-text flex flex-col justify-start items-start rtl">
                <p
                class="text-slate-700"
                >
                محمد الشعلان
                </p>
                <p
                class=" text-pink-600"
                >
                مدير دائرة الامداد
                </p>

                </div>
            </div>
            <div class="card h-[17rem] rtl  bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-4"
                >
                لا يسعنا إلا أن نشكر لكم جهودكم المتميزة والحثيثة وتعاونكم معنا في تدريب موظفي مكتبنا من أجل رفع كفاءة ومهنية الموظفين. آملين أن نستمر معكم في دورات أخرى قادمة, متمنيين لكم دوام الموفقية والنجاح.
                </p>
                <div class="content-text flex flex-col justify-start items-start rtl">

                <p
                class="text-slate-700"
                >
                هشام عبدالله
                </p>
                <p
                class=" text-pink-600"
                >
                مدير مكتب الشركة العامة للمعارض
                </p>
                </div>
            </div>
            <div class="card h-[17rem] rtl  bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-4"
                >
                يسر إدارة شركة جازان للاستشارات التسويقية أن تتقدم إلى إدارة أكاديمية الرواد للتدريب والاستشارات بجزيل الشكر والثناء على المجهود المميز والأداء الراقي المحترف والذي تبذله الأكاديمية في مجال التدريب وخصوصاً دورات اللغة الانجليزية في جميع مستوياتها وهذا يدل على الكفاءة العالية والخبرة المميزة لديكم. اننا نتمنى لكم المزيد من التقدم والنجاح.
                </p>
                <div class="content-text flex flex-col justify-start items-start rtl">
                <p
                class="text-slate-700"
                >
                محمد الحربي
                </p>
                <p
                class=" text-pink-600"
                >
                مدير عام شركة جازان للاستشارات التسويقية
                </p>
                </div>
            </div>
        </div>
    </div>
    <footer
    class="w-full z-10 flex px-16 min-h-[20rem] border-t-2 border-emerald-400 items-center justify-start gap-5 flex-col bg-slate-800 text-white py-5"
    >
    <div class="w-full rtl flex border-b py-2 border-slate-400 justify-between items-center ">
        <img src="{{asset('./images/19d7f5fbae4ea.jpg')}}" alt="logo" class="w-14" srcset="">
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
            مهما كانت الدورة التدريبية التي تبحث عنها! تقدم أكاديمية المبتكر مجموعة واسعة من الدورات التدريبية والدبلومات في مجالات مختلفة، مثل الإدارة, المحاسبة, التسويق, التصميم الجرافيكي, الهندسة, البرمجة, الشبكات, واللغات. قم بتنزيل كتيبات الدورات الآن!
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
