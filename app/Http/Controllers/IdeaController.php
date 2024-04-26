<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){
        // $validated = request()->validate([
        //     'content' => 'required|min:3|max:240'
        //     ]
        // );
        // Idea::create($validated);
        return view('ideas.show',compact('idea'));
    }
    public function edit(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }
    public function update(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
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
            'user_id'=>auth()->id()
        ]);
        return redirect()->route('dashboard.dashboard')->with('success','Idea created sucessfully.');
    }

    public function destroy(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $idea->delete();
        return redirect()->route('dashboard.dashboard')->with('success','Idea deleted sucessfully.');
    }
}
