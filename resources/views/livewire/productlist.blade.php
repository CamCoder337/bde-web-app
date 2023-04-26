
<div>
    @include('layouts.flash-message')
    <main class="my-2">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-2xl font-medium">Products</h3>
            <form class="flex flex-col md:flex-row gap-3" style="justify-content: center;" action="{{ route('/') }}" method="GET">
                    <div class="flex">
                        <input type="text" name="search" id="search" placeholder="Search for the product you want"
                            class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
                            >
                        <button type="submit" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                    </div>
                    <select name="category" id="category"
                        class="w-full md:w-80 h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                        <option value="All" selected="">All</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                    </select>
                <div class="flex">
                        <input placeholder="Minimum Price" 
                            class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
                    type="number" name="min_price" id="min_price" value="{{ $selectedPrice_min }}"
                            >
                    </div>
                    <div class="flex">
                        <input placeholder="Maximum Price" 
                            class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
                    type="number" name="max_price" id="max_price" value="{{ $selectedPrice_max }}"
                            >
    </div>
    
        </form>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($products as $product)
                    
                
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$product->image}}')">
                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" wire:click="addToCart({{$product->id}})">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{$product->name}}</h3>
                        <span class="text-gray-500 mt-2">{{$product->getFormatedPrice()}}</span>
                    </div>
                </div>
                @endforeach
                
            </div>
            
        </div>
        
    </main>
    <div class="pagination" style="display:flex; justify-content: center;align-items:center;">
                  {{ $products->links() }}
        </div>
</div>