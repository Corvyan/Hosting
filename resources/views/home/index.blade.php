@extends('layouts.app')

@section('page-content')
    <section class="relative min-h-screen flex items-center">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl sm:text-8xl">Compete with <span class="text-pink-500">Ease</span></h2>
            <h3 class="text-2xl sm:text-4xl italic">with EasyComp</h3>
        </div>

        <div class="absolute bottom-0 left-0 right-0 p-20">
            <p class="text-center">Scroll to learn more</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-screen-md mx-auto">
            <h3 class="text-4xl font-bold mb-6">Introduction</h3>
            <h4 class="text-xl mb-3 text-gray-200">Short Description</h4>
            <p class="mb-6">
                EasyComp is a comprehension competition management website that helps you create, record contests and competition digitally, 
                and manage competition administration all in one beautiful place. Save days on admin and grow your impact.
            </p>
            <a href="{{ route('about') }}" class="bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 
            transition">Learn more</a>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-screen-md mx-auto">
            <h3 class="text-4xl font-bold mb-6">Competition Categories</h3>
            <div class="flex flex-wrap -mx-2">
                @foreach($categories as $category)
                <div class="w-full sm:w-1/2 mb-3 px-2">
                    <div class="p-4 bg-gray-500 h-full rounded-lg">
                        <h3 class="text-xl font-bold mb-3">{{ $category->name }}</h3>
                        <p class="text-gray-200 mb-3">
                            {{ Str::limit($category->description, 200) }}
                        </p>
                        <a href="{{ route('home.category', $category) }}" target="_blank" rel="noopener noreferrer"
                        class="bg-pink-500 text-center py-2 px-4 
                        rounded hover:bg-purple-500 transition">Learn More !</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-screen-md mx-auto">
        @if ($competitions->count())
            <h3 class="text-4xl font-bold mb-6">List of Recent Competitions</h3>
            <h3 class="text-xl mb-6">The most recent and open competitions</h3>
            <div class="-mx-2 sm:flex">
                {{-- <a href="{{ url('https://thebiggestnose.com') }}" target="_blank" rel="noopener noreferrer" 
                class="block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition mx-2 mb-3 sm:mb-0">
                    <span class="mr-2">💻</span> Learn <strong>Machine</strong> Learning
                </a>
                <a href="{{ url('https://thebiggestnose.com') }}" target="_blank" rel="noopener noreferrer" 
                class="block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition mx-2 mb-3 sm:mb-0">
                    <span class="mr-2">💻</span> Learn <strong>Computer</strong> Vision
                </a> --}}
                
                @foreach($competitions as $competition)
                <div class="w-full sm:w-1/2 mb-3 px-2">
                    <div class="p-4 bg-gray-500 h-full rounded-lg">
                        <h3 class="text-gray-200 mb-3">{{$competition->date}}</h3>
                        <p class="text-xl font-bold mb-3">
                            {{ $competition->name }}
                        </p>
                        <a href="{{ route('home.competition', $competition) }}" target="_blank" rel="noopener noreferrer"
                        class="bg-pink-500 text-center py-2 px-4 
                        rounded hover:bg-purple-500 transition">More</a>
                    </div>
                </div>
                @endforeach

        @else
            <h3 class="text-4xl font-bold mb-6">List of Recent Competitions</h3>
            <h3 class="text-xl mb-6">There are currently no competitions being held. </h3>
        @endif
            </div>
        </div>
    </section>

@endsection