@extends('layouts.app')

@section('page-content')
    {{-- name email password --}}
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('user-management.update', $user) }}">
                @csrf
                {{-- @method('PUT') --}}
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" type="text" placeholder="User's name"
                    value="{{ $user->name }}" @error('name') is-invalid @enderror required">

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                          Email
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" id="email" name="email" type="text" placeholder="User's email"
                      value="{{ $user->email }}" @error('email') is-invalid @enderror required">
  
                      @error('email')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                          Password
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" id="password" name="password" type="password" placeholder="User's password"
                      @error('password') is-invalid @enderror required">
  
                      @error('password')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="id_number">
                          ID Number
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" id="id_number" name="id_number" type="text" placeholder="User's ID Number"
                      value="{{ $user->id_number }}" @error('id_number') is-invalid @enderror required">
  
                      @error('id_number')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="year_start">
                          Year Start
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" id="year_start" name="year_start" type="text" placeholder="Year Start"
                      value="{{ $user->year_start }}" @error('year_start') is-invalid @enderror required">
  
                      @error('year_start')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="university">
                          University
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" id="university" name="university" type="text" placeholder="User's University"
                      value="{{ $user->university }}" @error('university') is-invalid @enderror required">
  
                      @error('university')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="gender">
                          Gender
                      </label>
                    </div>
                    <div class="md:w-2/3">
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

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Faculty">
                          Faculty
                      </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="faculty" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($faculties as $faculty)
                                <option>{{ $faculty->faculty_name }}</option>
                            @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="major">
                          Major
                      </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="major" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($majors as $major)
                                <option>{{ $major->major_name }}</option>
                            @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>
                </div>

                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                  <div class="md:w-2/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Create
                    </button>
                  </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection