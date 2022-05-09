<?php

namespace App\Http\Controllers\Admin;

use App\Models\Competition;
use App\Models\User;
use App\Models\Appeal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::latest()->paginate(5);
        
        return view('admin.competition.dashboard', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.competition.crud.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'category' => 'required',
            'date' => 'required',
            'description' => 'required|max:1000',
            'poster' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $user_id = auth()->user()->id;
        $posterName = time() . '-' . $request->name . '.' . $request->poster->extension();

        $request->poster->move(public_path('images'), $posterName);
        
        //Competition::create($data);

        $competition = Competition::create([
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'poster' => $posterName,

        ]);

        return redirect()->route('competitions.index')->with('success', 'Success !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        $comp_id = $competition->id;
        $accepted_appeals_count = Appeal::where('appeal_status', '=', 1)
                                  ->where('competition_id', '=', $comp_id)                            
                                  ->count();
                                  
        $pending_appeals_count = Appeal::where('appeal_status', '=', 0)
        ->where('competition_id', '=', $comp_id)                            
        ->count();

        return view('admin.competition.crud.show', compact('competition', 'accepted_appeals_count', 'pending_appeals_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('admin.competition.crud.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|max:255',
            'description' => 'required|max:1000', 
            'poster' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $posterName = time() . '-' . $request->name . '.' . $request->poster->extension();

        $data['poster'] = $posterName;
        $request->poster->move(public_path('images'), $posterName);

        $competition->update($data);
  
        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
  
        return redirect()->route('competitions.index')->with('success', 'Competition deleted successfully');
    }
}
