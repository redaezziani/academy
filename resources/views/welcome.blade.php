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
    <body class=" w-full  flex-col relative bg-white flex justify-start items-center">
        <nav
        class="w-full bg-white flex border-b-[1.4px] justify-between fixed top-0 items-center px-10 py-4"

        >
            <div class="logo">
                <img src="../../public/images/pioneerstec.png" alt="logo"
                class="w-20"
                >
            </div>
            <div class="cart cursor-pointer flex justify-center items-center relative">
                <i
                class="fas fa-shopping-cart text-xl text-slate-900"
                >
                </i>
                <div class="products-count">
                    <span
                    class="absolute -top-2  -right-2 bg-yellow-400 text-slate-950 rounded-full px-1 text-xs"
                    >
                        2
                    </span>
                </div>
            </div>
        </nav>
        <main class="rtl hero  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
            <div class="side-bar flex flex-col min-w-[90px] justify-start items-center bg-white ">

            </div>
            <div class="menu-bar z-10 w-full mt-20 border-b-[1.4px] border-slate-200 flex justify-between items-center px-4 py-7">
                <div class="menu text-2xl cursor-pointer text-white flex justify-center items-center gap-2">
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
                    تسجيل الدخول
                    </button>
                    <button
                    class="  border-[1.4px] border-emerald-500 text-white  px-4 py-2 rounded-full"
                    >
                    مستخدم جديد
                    </button>
                </div>
            </div>
        </main>
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>

    </body>
</html>
