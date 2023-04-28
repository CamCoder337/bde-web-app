
<div>
    @include('layouts.flash-message')
    <main class="my-2">
        <div class="container mx-auto px-6">
        @auth
        @if (auth()->user()->isAdmin() || auth()->user()->isCesi())
            <a href="{{ route('download-images') }}" class="btn btn-primary">Download all Images</a>
        @endif
        @endauth
            <h3 class="text-gray-700 text-2xl font-medium">Upcoming Events</h3>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($events as $event)
                    
                
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$event->imgUrl()}}')">
                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" wire:click="subscribe({{$event->id}})">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 12H12M12 12H9M12 12V9M12 12V15M17 21H7C4.79086 21 3 19.2091 3 17V7C3 4.79086 4.79086 3 7 3H17C19.2091 3 21 4.79086 21 7V17C21 19.2091 19.2091 21 17 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> </g></svg>
                        </button>
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{$event->title}}</h3>
                        @if ($event->price == 0)
                            <span class="text-green-500 mt-2">Free</span>
                            
                        @else
                        <span class="text-blue-500 mt-2">{{$event->price}}XAF</span>
                        @endif
                    </div>
                </div>
                @endforeach
                
            </div>
            
        </div>
        
    </main>
    <div class="pagination" style="display:flex; justify-content: center;align-items:center;">
                  {{ $events->links() }}
        </div>
</div>