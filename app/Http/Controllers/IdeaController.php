<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdeaController extends Controller
{
    //

    public function index()
    {
        return view('ideas.index');
    }
    public function ideaForm()
    {
        if(auth()->user()){
            return view('ideas.add_idea');
        }
        redirect(route('login'));
       
    }
    public function addIdea(CreateIdeaRequest $request)
    {
        //dd($request->all());
        if(auth()->user()){
            /** @var UploadedFile|null $image */
            $image = $request->validated('image');
            $imagePath = $image->store('events','public');

            $idea = Event::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'start_date' => $request->input('start_date'),
        ]);
        return redirect(route('ideas.index'))->with('success', 'Your idea was added !!!');
        
        }
        return redirect(route('login'));
    }
}
