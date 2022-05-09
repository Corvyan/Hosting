<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Major;
use App\Models\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('auth.register', compact('faculties', 'majors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'id_number' => 'required',
            'gender' => 'required',
            'year_start' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'major' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        //$request->session()->flash('success', 'Registration Successful !');

        return redirect('/login')->with('success', 'Registration Successful !');
    }
}
