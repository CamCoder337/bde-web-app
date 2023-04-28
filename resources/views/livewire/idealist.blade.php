<section class="bg-orange dark:bg-orange-600">
@include('layouts.flash-message')
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Ideas Box
<a class="block mx-auto shadow bg-gray-800 hover:bg-white  focus:shadow-outline focus:outline-none text-orange-600 text-xs py-3 px-10 rounded " href="{{route('ideas.add_idea')}}">Add a new Idea</a></h1>

        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
        @foreach ($ideas as $idea)
            <div class="lg:flex" style="background:#fefefe;padding: 5px; border-radius:10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{$idea->imgUrl()}}" alt="">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                    <h3 class="text-xl font-semibold text-black-800 dark:text-black">
                    {{$idea->title}}
                    </h3>
                    <button class="btn btn-primary" wire:click="vote({{$idea->id}})">VOTE</button><span>15</span>
                    <span class="text-sm text-gray-900 dark:text-gray-500">On: {{$idea->start_date}}</span>
                </div>
            </div>
            @endforeach    
        </div>
    </div>
    <div class="pagination" style="display:flex; justify-content: center;align-items:center;width:100%">
                  {{ $ideas->links() }}
    </div>
</section>


