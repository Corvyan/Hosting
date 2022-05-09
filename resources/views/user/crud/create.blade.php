@extends('layouts.app')

@section('page-content')
    {{-- name email password --}}
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('users.appeal', $competition) }}">
                @csrf

                <h5 class="text-2xl text-center text-gray-200 mb-6 mt-4">Participant 1</h5>

                {{-- START OF PARTICIPANT 1--}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 1's Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant1_name" name="participant1_name" type="text" placeholder="Name"
                    @error('participant_1_name') is-invalid @enderror required">

                    @error('participant_1_name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 1's University
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant1_university" name="participant1_university" type="text" placeholder="University"
                    @error('participant_1_university') is-invalid @enderror required">

                    @error('participant_1_university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                {{-- END OF PARTICIPANT 1--}}

                <h5 class="text-2xl text-center text-gray-200 mb-6 mt-24">Participant 2</h5>
                <h5 class="text-sm text-center text-gray-200 mb-6">( optional )</h5>

                {{-- START OF PARTICIPANT 2--}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 2's Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant2_name" name="participant2_name" type="text" placeholder="Name"
                    @error('participant_2_name') is-invalid @enderror required">

                    @error('participant_2_name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 2's University
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant2_university" name="participant2_university" type="text" placeholder="University"
                    @error('participant_2_university') is-invalid @enderror required">

                    @error('participant_2_university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                {{-- END OF PARTICIPANT 2--}}

                <h5 class="text-2xl text-center text-gray-200 mb-6 mt-24">Participant 3</h5>
                <h5 class="text-sm text-center text-gray-200 mb-6">( optional )</h5>
                
                {{-- START OF PARTICIPANT 3--}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 3's Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant3_name" name="participant3_name" type="text" placeholder="Name"
                    @error('participant_3_name') is-invalid @enderror required">

                    @error('participant_3_name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 3's University
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant3_university" name="participant3_university" type="text" placeholder="University"
                    @error('participant_3_university') is-invalid @enderror required">

                    @error('participant_3_university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                {{-- END OF PARTICIPANT 3--}}

                <h5 class="text-2xl text-center text-gray-200 mb-6 mt-24">Participant 4</h5>
                <h5 class="text-sm text-center text-gray-200 mb-6">( optional )</h5>

                {{-- START OF PARTICIPANT 4--}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 4's Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant4_name" name="participant4_name" type="text" placeholder="Name"
                    @error('participant_4_name') is-invalid @enderror required">

                    @error('participant_4_name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 4's University
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant4_university" name="participant4_university" type="text" placeholder="University"
                    @error('participant_4_university') is-invalid @enderror required">

                    @error('participant_4_university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                {{-- END OF PARTICIPANT 4--}}

                <h5 class="text-2xl text-center text-gray-200 mb-6 mt-24">Participant 5</h5>
                <h5 class="text-sm text-center text-gray-200 mb-6">( optional )</h5>

                {{-- START OF PARTICIPANT 5--}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 5's Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant5_name" name="participant5_name" type="text" placeholder="Name"
                    @error('participant_5_name') is-invalid @enderror required">

                    @error('participant_5_name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Participant 5's University
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="participant5_university" name="participant5_university" type="text" placeholder="University"
                    @error('participant_5_university') is-invalid @enderror required">

                    @error('participant_5_university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>
                {{-- END OF PARTICIPANT 5--}}
                
                  

                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                  <div class="md:w-2/3">
                      <button type="submit" class="bg-pink-500 hover:bg-pink-900 text-white font-bold py-2 px-4 rounded">
                          Send Request
                      </button>
                  </div>
                </div>
            
            
        </div>
    </section>
@endsection