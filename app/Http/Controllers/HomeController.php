<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Competition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $competitions = Competition::latest()->paginate(5);
        
        return view('home.index', compact('categories', 'competitions'));
    }

    public function category(Category $category)
    {
        
        return view('home.category', compact('category'));
    }

    public function competition(Competition $competition)
    {
        
        return view('home.competition', compact('competition'));
    }
}
