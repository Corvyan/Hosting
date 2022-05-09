@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto flex flex-col justify-center items-center">
            @if(session()->has('success'))
                <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-4" role="alert">
                    <p class="font-bold">{{ session('success') }}</p>
                    <p class="text-sm pt-2">Congratulations .</p>
                </div>
            @endif
            <h2 class="text-6xl text-center mb-6">Admin Dashboard</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">Competition List</h3>
            <a href="{{ route('competitions.create') }}" class="bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 
            transition mb-8 mt-2">Create</a>

            <!-- TABLE -->
            <!-- This example requires Tailwind CSS v2.0+ -->
            
            @if ($competitions->count())
                <table class="mt-4 min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Request</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Blank</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Blank</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Blank</span>
                        </th>
                    </tr>
                    </thead>

                    <!-- COMPETITIONS LIST -->
                        <tbody class="bg-white divide-y divide-gray-200"> 
                            @foreach ($competitions as $competition)
                                @if (isset(Auth::user()->id) && Auth::user()->id == $competition->user_id)
                                    <tr>
                                        @if ($competition->appeals->count() == 0)
                                            <td class="px-6 py-4 whitespace-nowrap text-base text-red-900">0</td>
                                        @else
                                            <td class="px-6 py-4 whitespace-nowrap text-base text-red-500">{{ $competition->appeals->where('appeal_status', '=', 0)->count() }}</td>
                                        @endif
                                        
                                        <td style="width:1000px" class="px-6 py-4 whitespace-nowrap text-base text-gray-900">{{ $competition->category }}</td>
                                        <td style="width:1000px" class="px-6 py-4 whitespace-nowrap text-base text-gray-900">{{ $competition->name }}</td>
                                        <td style="width:1000px" class="px-6 py-4 whitespace-nowrap text-base text-gray-900">{{ $competition->date }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('competitions.show', $competition->id) }}" class="text-green-600 hover:text-green-900">View</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('competitions.edit', $competition->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>

                                            <td> 
                                                <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-transparent hover:text-pink-900 text-pink-500 font-semibold hover:text-pink py-2 px-4">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td> 
                                    </tr> 
                                @endif      
                            @endforeach
                            

                        <!-- Add More... -->
                        </tbody>
                    <!-- COMPETITIONS LIST END -->
                </table>
                <div class="mt-6 mr-40">
                    {{ $competitions->links() }}
                </div>
                
                            
            <!-- TABLE END -->
            @else
                <h4 class="text-lg text-center text-gray-200 mb-6 mt-14">There are no competitions</h4>
            @endif
            
        </div>
    </section>
    
@endsection