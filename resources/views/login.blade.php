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
