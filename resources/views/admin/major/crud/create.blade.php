@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('majors.store') }}">
                @csrf
                
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-auto">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="major_name">
                        Major Name
                    </label>
                  </div>
                  <div class="md:w-auto">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="major_name" name="major_name" type="text" placeholder="Major name"
                    @error('name') is-invalid @enderror required">

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>

                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                  <div class="md:w-2/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Confirm
                    </button>
                  </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection