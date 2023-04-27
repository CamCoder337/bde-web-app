<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventSub;
use App\Models\Like;
use Livewire\WithPagination;

class Eventlist extends Component
{
    use WithPagination;
    
    public function render()
    {
        $events = Event::query()->where('active', 1)->where('validate', 1)->paginate(10);
        return view('livewire.eventlist',compact('events'));
    }

    public function subscribe($id){
        if(auth()->user()){
             $data = ['user_id' =>auth()->user()->id,
             'event_id' => $id,
            ];
            if(EventSub::where($data)->exists()){
                session()->flash('info', 'You already participate to this event');
                return;
            }
            EventSub::create($data);

            session()->flash('success', 'You have successfully subscribed to this event');
        }
        else{
            return redirect(route('login'));
        }
    }

    public function like($id){
        if(auth()->user()){
            $event = Event::find($id);
            $like = new Like;
            $like->save();
            $event->likes()->attach($like);

            $this->emit('udapteLikeCount');
            session()->flash('success', 'You like it');
            return redirect(route('events.index'));
        }
        else{
            return redirect(route('login'));
        }
    }
}
