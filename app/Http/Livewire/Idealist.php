<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventVote;
use Livewire\WithPagination;

class Idealist extends Component
{
    use WithPagination;
    public function render()
    {
        $query = Event::query();
        $query->where('validate', 0);
        $ideas = $query->paginate(4);
        return view('livewire.idealist',['ideas' => $ideas]);
    }

    public function vote($id){
        if(auth()->user()){
             $data = ['user_id' =>auth()->user()->id,
             'event_id' => $id,
            ];
            if(EventVote::where($data)->exists()){
                session()->flash('info', 'You already vote for this event');
                return;
            }
            EventVote::create($data);

            session()->flash('success', 'You have successfully voted to this event');
        }
        else{
            return redirect(route('login'));
        }
    }

    
}
