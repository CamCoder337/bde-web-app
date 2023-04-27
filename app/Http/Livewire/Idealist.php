<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class Idealist extends Component
{
    use WithPagination;
    public function render()
    {
        $ideas = Event::query()->where('active', 0)->where('validate', 0)->paginate(20);
        return view('livewire.idealist', compact('ideas'));
    }

    
}
