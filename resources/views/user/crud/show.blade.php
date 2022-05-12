@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h3 class="text-4xl text-center text-gray-200 mb-6">{{ $competition->name }}</h3>
            <img src="{{ asset('images/' . $competition->poster) }}" class="object-contain h-48 w-96 mb-8 mt-8 shadow-xl mx-auto" alt="">
            <h4 class="text-lg text-center text-gray-200 mb-6">Due date : {{ $competition->date }}</h3>
            <p class="mb-3">
                {{ $competition->description }}
            </p>

            <div class="flex flex-col justify-center items-center">

                @if (Auth::user()->appeals->count() == 0)
                    <div class="text-center">
                        <a href="{{ route('users.create', $competition) }}" class="mt-6 inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Create Form Request</a>
                    </div>
                @else
                    
                @endif

                {{-- @if (!$competition->appealedBy(auth()->user()))
                    <div class="text-center">
                        <a href="{{ route('users.create', $competition) }}" class="mt-6 inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Create Form Request</a>
                    </div>
                @else
                    
                @endif --}}



                {{-- @if (!$competition->appealedBy(auth()->user()))
                    <form action="{{ route('users.appeal', $competition) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="bg-pink-500 hover:bg-pink-900 text-white font-bold py-2 px-4 rounded">
                            Send Request
                        </button>
                    </form>
                @else

                    {{-- <h4 class="text-lg text-center text-gray-200 mb-6 mt-14">Your request is on pending</h3> --}}
                    
                    {{-- <form action="{{ route('users.appeal', $competition) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-pink-500 hover:bg-pink-900 text-white font-bold py-2 px-4 rounded">
                            Cancel Request
                        </button>
                    </form> --}}
                {{-- @endif --}}
            </div>
        
        </div>
    </section>
@endsection