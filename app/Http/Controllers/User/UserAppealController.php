<?php

namespace App\Http\Controllers\User;

use App\Models\Appeal;
use App\Models\Competition;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAppealController extends Controller
{
    public function create(Competition $competition)
    {
        return view('user.crud.create', compact('competition'));
    }

    public function store(Competition $competition, Request $request)
    {
        // if ($competition->appealedBy($request->user())) {
        //     return response(null, 409);
        // }

        // $competition->appeals()->create([
        //     'user_id' => $request->user()->id,
        //     'user_name' => $request->user()->name,
        // ]);

        // return back();

        $request->validate([
            'participant1_name' => 'required',
            'participant2_name' => 'string|max:255|nullable',
            'participant3_name' => 'string|max:255|nullable',
            'participant4_name' => 'string|max:255|nullable',
            'participant5_name' => 'string|max:255|nullable',
            'participant1_university' => 'required',
            'participant2_university' => 'string|max:255|nullable',
            'participant3_university' => 'string|max:255|nullable',
            'participant4_university' => 'string|max:255|nullable',
            'participant5_university' => 'string|max:255|nullable',
            
        ]);

        $competition->appeals()->create([
            'user_id' => $request->user()->id,
            'user_name' => $request->user()->name,
            'participant1_name' => $request->input('participant1_name'),
            'participant2_name' => $request->input('participant2_name'),
            'participant3_name' => $request->input('participant3_name'),
            'participant4_name' => $request->input('participant4_name'),
            'participant5_name' => $request->input('participant5_name'),
            'participant1_university' => $request->input('participant1_university'),
            'participant2_university' => $request->input('participant2_university'),
            'participant3_university' => $request->input('participant3_university'),
            'participant4_university' => $request->input('participant4_university'),
            'participant5_university' => $request->input('participant5_university'),
            
        ]);

        return redirect()->route('users.index')->with('success', 'Request sent !');
    }

    public function destroy(Competition $competition, Request $request)
    {
        $request->user()->appeals()->where('competitions_id', $competition->id)->delete();

        return back();
    }
}
