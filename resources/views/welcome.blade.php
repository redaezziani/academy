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
        class="w-full bg-white flex border-b-[1.4px] justify-between fixed top-0 items-center px-8 py-4"
        
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
        <main class="rtl hero w-full flex flex-col justify-start items-center gap-3">

        </main>
    </body>
</html>
