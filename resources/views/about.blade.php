@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h2 class="text-6xl text-center mb-6">About</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">What is EasyComp ?</h3>
            <p class="mb-3 text-center">
                In preparation for a student competition, a good, coherent and scheduled coordination is needed.
            </p>
            <p class="mb-3 text-center">
                Problems began to arise when there was no synergy from students participating in competitions with supervisors and student competition coordinators, causing administrative arrangements, material/content preparation and also mentality in competing to be neglected.            </p>
            <div class="mb-6 text-center">
                The above are obstacles that are often faced by one of the lecturers coordinating student competitions at most Universities. Therefore, a system is needed that can help manage all contest or competition scheduling, the resources of the students involved, the supervisors involved, the administration of the competition in every field, even to the system.            </div>
            <div class="text-center">
                <a href="{{ route('home.index') }}" class="inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Home </a>
            </div>
        </div>
    </section>
@endsection