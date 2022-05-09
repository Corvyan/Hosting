@extends('layouts.app')

@section('page-content')
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 mt-56 mb-36 rounded-lg shadow-2xl">
        <section>
            <h3 class="text-black font-bold text-2xl">Welcome to EasyComp</h3>
            <p class="text-gray-600 pt-2">Register Here.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('store') }}">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Name</label>
                    <input type="text" id="name" value="" name="name" placeholder="Your Name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('name') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" value="" id="email" name="email" placeholder="name@example.com" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('email') is-invalid @enderror required">
                    
                    <!-- INVALID INPUT MESSAGE -->

                    @error('email')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your Password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('password') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('password')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">ID Number</label>
                    <input type="text" id="id_number" value="{{ old('id_number') }}" name="id_number" placeholder="Your ID Number" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('id_number') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('id_number')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Gender</label>
                    
                    <div class="ml-4 mb-4 md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="gender" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>

                    
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Year Start</label>
                    <input type="text" id="year_start" value="" name="year_start" placeholder="Your Year Start" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('year_start') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('year_start')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">University</label>
                    <input type="text" id="university" value="" name="university" placeholder="Your University" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('university') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('university')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Faculty</label>
                    
                    <div class="ml-4 mb-4 md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="faculty" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>

                    
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Major</label>
                    
                    <div class="ml-4 mb-4 md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="major" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->major_name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>

                    
                </div>
                
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Register</button>
            </form>
        </section>
    </main>

@endsection