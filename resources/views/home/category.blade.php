@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h3 class="text-4xl text-center text-gray-200 mb-6 mt-16">{{ $category->name }}</h3>
            <p class="text-xl mb-3">
                {{ $category->description }}
            </p>
            <div class="text-center mb-36 mt-8">
                <a href="{{ route('home.index') }}" class="inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Back </a>
            </div>
        </div>
    </section>
@endsection