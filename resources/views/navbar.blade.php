<nav
        class="w-full bg-white flex border-b-[1.4px] justify-between z-50 fixed top-0 items-center pr-8 pl-3 py-4"
        >
            <div class="logo flex">
                <a
                href="/"
                >
                <img
                src="{{asset('./images/19d7f5fbae4ea.jpg')}}"
                alt="logo"
                style="height:50px; margin-right:20px"
                >
                </a>
                @if(!auth()->check())
                <a href="/login">
                    <button class="bg-transparent hover:bg-green-500 text-green-500 font-semibold p-1 hover:text-white border border-green-500 hover:border-transparent rounded">تسجيل الدخول </button>
                </a>
                @endif
            </div>
            <div class="cart cursor-pointer flex justify-center items-center relative">
                <a href="/Cart"
                class="fas fa-shopping-cart text-xl text-slate-400"
                >
                </a>
                <div class="products-count">
                    <span
                    class="absolute -top-2  -right-2 bg-emerald-400 text-slate-950 rounded-md hover:bg-emerald-600 transition-colors duration-300 ease-out px-1 text-xs"
                    >
                        {{$count}}
                    </span>
                </div>
            </div>
        </nav>
