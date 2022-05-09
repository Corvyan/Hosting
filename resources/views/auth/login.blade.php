@extends('layouts.app')

@section('page-content')
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 mt-56 rounded-lg shadow-2xl">
        @if(session()->has('success'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-4" role="alert">
                <p class="font-bold">{{ session('success') }}</p>
                <p class="text-sm pt-2">Please login.</p>
            </div>
        @endif
        @if(session()->has('loginError'))
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mb-4" role="alert">
                <p class="font-bold">{{ session('loginError') }}</p>
                <p class="text-sm pt-2">Please try again</p>
        </div>
        @endif
        
        <section>
            <h3 class="text-black font-bold text-2xl">Welcome to EasyComp</h3>
            <p class="text-gray-600 pt-2">Sign in to your account.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('authenticate') }}">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" name="email" placeholder="name@example.com" id="email" value="{{ old('email') }}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" 
                    @error('email') is-invalid @enderror autofocus required>

                    @error('email')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                    
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" required>
                </div>
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-700 hover:underline mb-6">Forgot your password?</a>
                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
            </form>
        </section>
    </main>

    <div class="mb-40 max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">Don't have an account? <a href="{{ route('register') }}" class="font-bold hover:underline">Sign up</a>.</p>
    </div>
@endsection