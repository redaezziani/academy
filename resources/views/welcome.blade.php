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
                    <a >
                    <button onclick="hidelive()" id="recordbutton"
                    class="bg-slate-500 text-white  px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out"
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
                </div>
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
            تعلم.. طور.. وحقق نجاحك مع أكاديمية الرواد!
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
        class=" w-full flex-wrap  rtl border-t-2 border-emerald-500  flex bg-white  justify-start items-center"
        >
        <div class="w-full md:w-1/2 relative h-fit flex justify-center min-h-[30rem] md:max-h-0  items-center">
            <img src="{{asset('./images/hero.jpg')}}" class="w-full opacity-60 h-full absolute top-0 inset-0 z-0 left-0" alt="" srcset="">
            <div class="text-content px-8 flex justify-center items-center gap-4 flex-col z-10">
                <h2
                class="md:text-4xl text-2xl  font-semibold text-white"
                >مكتبة الدورات المسجلة</h2>
                <p
                class="md:text-xl text-sm text-white/90"
                >تعلم في الأوقات المناسبة لك</p>
                <a href="/RecordCourses">
                    <button
                    class="bg-emerald-500 text-white  px-4 py-2 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out"
                    >
                    استعرض الدورات المتاحة
                    </button>
                </a>
            </div>
        </div>
        <div class=" w-full md:w-1/2 relative h-fit flex justify-center min-h-[30rem] md:max-h-0  items-center">
            <img src="{{asset('./images/pexels-vlada-karpovich-4050415.jpg')}}" class="w-full opacity-50 h-full absolute top-0 inset-0 z-0 left-0" alt="" srcset="">
            <div class="text-content px-8 flex justify-center items-center gap-4 flex-col z-10">
                <h2
                class="md:text-4xl text-2xl  font-semibold text-white"
                >نظام التعلم عن بعد</h2>
                <p
                class="md:text-xl text-sm text-blue-700/80"
                >بخاصية البث المباشر</p>
                <p
                class='md:text-xl text-sm text-center text-white/80'
                >
                يمكنك الإلتحاق بالدورات التي تعقد في الأكاديمية دون الحاجة للتواجد داخل القاعة التدريبية
                </p>
                <a href="">
                    <button
                    class=" bg-blue-400 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                    >
                    اعرف المزيد
                    </button>
                </a>
            </div>
        </div>
    </main>
    <div class="w-full rtl z-10 bg-slate-100 min-h-[30rem] flex justify-center flex-col gap-3 items-center">
        <h1
        class="text-4xl text-slate-800 font-semibold"
        >
        آراء <span
        class="text-emerald-500"
        >العملاء</span>
        </h1>
        <div class="grid grid-cols-1 px-6 mt-3 sm:grid-cols-2 md:grid-cols-3 gap-4 ">
            <div class="card rtl  bg-white p-5 maxw-[70%] flex flex-col gap-2 justify-start items-start w-full col-span-1">
                <p
                class="text-slate-400"
                >
                نتقدم بخالص الشكر ووافر التقدير على ما تبذلونه من جهود مثمرة ومتواصلة فيما يتعلق بالدورات التدريبية التي قدمت لموظفي شركة كراون الشرق الأوسط لصناعة العبوات لافتين النظر الى اسلوبكم البسيط والعملي في ايصال المعلومة وحرصكم على بلوغ الاستفادة القصوى منها, وهو ما انعكس إيجابا على أداء الموظفين بشكل خاص وعلى الشركة بشكل عام. يشرفنا استمرار التعاون فيما بيننا في المستقبل من خلال البرامج التدريبية التي تساهم في تلبية الاحتياجات العملية لمختلف دوائر الشركة.
                </p>
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
            <div class="card rtl  bg-white p-5 maxw-[70%] flex flex-col gap-2 justify-start items-start w-full col-span-1">
                <p
                class="text-slate-400"
                >
                نتقدم بخالص الشكر ووافر التقدير على ما تبذلونه من جهود مثمرة ومتواصلة فيما يتعلق بالدورات التدريبية التي قدمت لموظفي شركة كراون الشرق الأوسط لصناعة العبوات لافتين النظر الى اسلوبكم البسيط والعملي في ايصال المعلومة وحرصكم على بلوغ الاستفادة القصوى منها, وهو ما انعكس إيجابا على أداء الموظفين بشكل خاص وعلى الشركة بشكل عام. يشرفنا استمرار التعاون فيما بيننا في المستقبل من خلال البرامج التدريبية التي تساهم في تلبية الاحتياجات العملية لمختلف دوائر الشركة.
                </p>
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
            <div class="card rtl  bg-white p-5 maxw-[70%] flex flex-col gap-2 justify-start items-start w-full col-span-1">
                <p
                class="text-slate-400"
                >
                نتقدم بخالص الشكر ووافر التقدير على ما تبذلونه من جهود مثمرة ومتواصلة فيما يتعلق بالدورات التدريبية التي قدمت لموظفي شركة كراون الشرق الأوسط لصناعة العبوات لافتين النظر الى اسلوبكم البسيط والعملي في ايصال المعلومة وحرصكم على بلوغ الاستفادة القصوى منها, وهو ما انعكس إيجابا على أداء الموظفين بشكل خاص وعلى الشركة بشكل عام. يشرفنا استمرار التعاون فيما بيننا في المستقبل من خلال البرامج التدريبية التي تساهم في تلبية الاحتياجات العملية لمختلف دوائر الشركة.
                </p>
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
