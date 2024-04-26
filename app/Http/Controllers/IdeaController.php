<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(){
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
            ]
        );
        Idea::create($validated);
        return view('ideas.show',compact('idea'));
    }
    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }
    public function update(Idea $idea){
        $validated= request()->validate(
            [
                'content' => 'required|min:3|max:240'
            ]
        );
        $idea->update($validated);
        return redirect()->route('idea.show',compact('idea'))->with('success','Idea Updated Successfully.');
    }
    public function store(){
        request()->validate(
            [
                'content' => 'required|min:3|max:240'
            ]
        );
        $idea = Idea::create([
            'content'=> request()->get('content'),
        ]);
        return redirect()->route('dashboard.dashboard')->with('success','Idea created sucessfully.');
    }

    public function destroy(Idea $id){
        $id->delete();
        return redirect()->route('dashboard.dashboard')->with('success','Idea deleted sucessfully.');
    }
}
