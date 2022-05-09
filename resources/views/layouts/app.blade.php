<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyComp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        .dropdown:focus-within .dropdown-menu {
          opacity:1;
          transform: translate(0) scale(1);
          visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-700 text-white">
    <header class="fixed bg-gray-700 top-0 left-0 right-0 z-50">
        <div class="container mx-auto flex justify-between p-4">
            <h1 class="text-xl font-black">EasyComp</h1>
                <nav class="-mx-2">
                    <a href="{{ route('home.index') }}" class="text-lg mx-2 text-white hover:text-pink-500 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-lg mx-2 text-white hover:text-pink-500 transition">About</a>
 
                    @auth
                    <!-- DROPDOWN MENU-->
                        <div class="ml-2 relative inline-block text-left dropdown">
                            <span class="rounded-md shadow-sm">
                              <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 
                              text-white transition duration-150 ease-in-out bg-gray border border-gray-300 rounded-md 
                              hover:text-pink-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" 
                               type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                                <span>Welcome, {{ auth()->user()->name }}</span>
                                <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button></span>
                            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="px-4 py-3">         
                                        <p class="text-black leading-5">Signed in as</p>
                                        <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{ auth()->user()->email }}</p>
                                    </div>

                                    {{-- START MENU ADMIN --}}

                                    @if(auth()->user()->role_id == 1)
                                    <div class="py-1">
                                        <a href="{{ route('competitions.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Dashboard</a>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('categories.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Category</a>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('user-management.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >User Management</a>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('faculties.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Faculty Management</a>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('majors.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Major Management</a>
                                    </div>
                                    @endif

                                    {{-- END MENU ADMIN --}}

                                    {{-- START MENU USER --}}
                                    @if(auth()->user()->role_id == 2)
                                    <div class="py-1">
                                        <a href="{{ route('users.index') }}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Dashboard</a>
                                    </div>
                                    @endif

                                    {{-- END MENU USER --}}
                                    


                                    <div class="py-1">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem">
                                                Sign out
                                            </button>
                                        </form>
                                        {{-- <a href="javascript:void(0)" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Sign out</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- https://tailwindcomponents.com/component/pure-css-dropdown-using-focus-within-with-animation-->
                    <!-- DROPDOWN MENU--> 
                    @else
                        <a href="{{ route('login') }}" class="text-lg mx-2 text-white hover:text-pink-500 transition">Login</a>
                    @endauth
                    
                </nav>

                
        </div>
        
    </header>

    <main>
        @yield('page-content')
    </main>

    <footer>
        <div class="container mx-auto p-4">
            <p>&copy; EasyComp | Compete with ease</p>
        </div>
    </footer>
</body>
</html>