<?php

namespace App\Http\Controllers\User;

use App\Models\Competition;
use App\Models\User;
use App\Models\Appeal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $competitions = Competition::latest()->paginate(6);

        return view('user.dashboard', compact('competitions'));
    }

    public function show(Competition $competition)
    {
        //$appeals = Appeal::all();
        return view('user.crud.show', compact('competition'));
    }
}
