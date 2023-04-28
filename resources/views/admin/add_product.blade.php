<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
</x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Add a Product!") }}
                </div>
            </div>
        </div>
    </div>
<div class="flex items-center justify-center p-12">

  <div class="mx-auto w-full max-w-[550px]">
    
    <form action="" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3">
          <div class="mb-5">
            <label
              for="name"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Title
            </label>
            <input
              type="text"
              name="name"
              id="name"
              value="Product name"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error("name")
                {{$message}}
            @enderror
          </div>
        </div>

      </div>
      <div class="mb-5">
        <label
          for="description"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Description
        </label>
        <textarea
          type="text"
          name="description"
          id="description"
          value="Description"
          min="0"
          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        >Description of your product</textarea>
        @error("description")
                {{$message}}
            @enderror
      </div>
      <div class="w-full px-3">
          <div class="mb-5">
            <label
              for="Category"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Category
            </label>
            <select name="category" id="category" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

            </select>
            @error("category")
                {{$message}}
            @enderror
          </div>
        </div>
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3">
          <div class="mb-5">
            <label
              for="price"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            Price (XAF)
            </label>
            <input
              type="text"
              name="price"
              id="price"
              value="0"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error("price")
                {{$message}}
            @enderror
          </div>
        </div>

      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3">
          <div class="mb-5">
            <label
              for="file"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Image
            </label>
            <input
              type="file"
              name="image"
              id="file"

              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error("image")
                {{$message}}
            @enderror
          </div>
        </div>
      </div>

      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#FFA900] py-3 px-8 text-center text-base font-semibold text-white outline-none"
        >
          Submit
        </button>
      </div>
    </form>
    <a href="{{route('dashboard')}}" class="btn btn-primary">Dashboard</a>
    
  </div>
  
</div>

</x-app-layout>