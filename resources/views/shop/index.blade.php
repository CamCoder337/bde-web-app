<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
</x-slot>
<form class="flex flex-col md:flex-row gap-3" style="justify-content: center;" action="{{ route('shop.index') }}" method="GET">
    <div class="flex">
        <input type="text" name="search" id="search" placeholder="Search for the product you want"
			class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
			>
        <button type="submit" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
    </div>
    <select name="category" id="category"
		class="w-full md:w-80 h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
		<option value="All" selected="">All Categories</option>
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

<div class="py-12">

<div style="justify-content: center; align-items:center; display:flex; font-size:3rem;">
    @if($searchTerm)
        <p>Résultats de recherche pour "{{ $searchTerm }}" :</p>
      @endif
    </div>
<!-- component -->
<div tabindex="0" class="focus:outline-none">
            <!-- Remove py-8 -->
            <div class="mx-auto container py-8">
                <div class="grid grid-cols-4 grid-gap-4 mw:grid-cols-3 md: grid-cols-1">
                    <!-- Card 1 -->
                    @foreach ($products as $product )
                    <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                        <div>
                            <img alt="person capturing an image" src="{{$product->image}}" tabindex="0" class="focus:outline-none w-full h-44" />
                        </div>
                        <div class="bg-white">
                            <div class="flex items-center justify-between px-4 pt-4">
                                <div>
                                    
                                </div>
                                <div class="bg-yellow-200 py-1.5 px-6 rounded-full">
                                    <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">{{$product->getFormatedPrice()}}</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center">
                                    <h4 tabindex="0" class="focus:outline-none text-lg font-semibold">{{$product->name}}</h4>
                                </div>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{$product->description}}</p>
                                <div class="flex mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
            <div class="pagination" style="display:flex; justify-content: center;align-items:center;">
                  {{ $products->links() }}
            </div>
</div>

</x-app-layout>