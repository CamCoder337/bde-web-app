<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class LikeCounter extends Component
{

    public $event_id;
    protected $listeners = ['udapteLikeCount' => 'getCartItemCount'];

    public $likes;

    public function mount($id)
    {
        $this->event_id = $id;
        $this->getLikeCount();
    }

    public function render()
    {
        $this->getLikeCount();
        return view('livewire.like-counter');
    }

    public function getLikeCount(){
        $event = Event::find($this->event_id);

        // Récupérer les likes associés à l'événement
        $likes = $event->likes;

        // Afficher le nombre de likes
        $this->likes = $likes->count();   
    }
}
