
<div class="bg-white">
<form action="{{route('shop.index')}}" method="GET"class="flex flex-col md:flex-row gap-3" style="justify-content: center;">
    <div class="flex">
        <input type="text" name="search" id="search" placeholder="Search by name" class="w-full md:w-80 px-3 h-10 rounded-1 border-2 border-orange-500 focus:outline-none focus:border-orange-500">
        <button type="submit" class="bg-orange-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
    </div>
    <select name="category" id="category" class="w-full md:w-80 px-3 h-10 rounded-1 border-2 border-orange-500 focus:outline-none focus:border-sorangehy-500">
    <option value="" selected ="">All</option>
    @foreach ($categories as $category)
      <option value="{{$category->id}}" {{ $category->id ==$selectedCategory ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach

    </select>

    <div class="flex">
        <input type="number" name="price" id="price" placeholder="Max price" class="w-full md:w-80 px-3 h-10 rounded-1 border-2 border-orange-500 focus:outline-none focus:border-orange-500" value="{{$price}}">
    </div>

    </form>
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
  
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>
  
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
    @foreach ($products as $product)
      <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="{{$product->image}}" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <span aria-hidden="true" class="absolute inset-0"></span>
                {{$product->name}}
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">{{$product->getFormatedPrice()}}</p>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  <div class="pagination" style="display:flex; justify-content: center;align-items:center;">
                  {{ $products->links() }}
    </div>
</div>
