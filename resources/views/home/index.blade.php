<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
<section
  class="relative bg-[url({{ asset('images/campus.jpg') }})] bg-cover bg-center bg-no-repeat"
>
  <div
    class="absolute inset-0 bg-black/75 sm:bg-transparent sm:from-black/95 sm:to-black/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
  ></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold sm:text-5xl text-gray-100">
        Digital Space For Student by

        <strong class="block font-extrabold text-orange-600">
          X2026
        </strong>
      </h1>

      <p class="mt-4 max-w-lg sm:text-xl/relaxed text-gray-200">
      With Ubuntu, be at the heart of your community life. We are listening to make our campus a welcoming and friendly environment for everyone.
      <strong class="text-gray-100">"I am because we are"</strong>
      </p>

      <div class="mt-8 flex flex-wrap gap-4 text-center">
        <a
          href="{{route('shop.index')}}"
          class="block w-full rounded bg-orange-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-orange-700 focus:outline-none focus:ring active:bg-rose-500 sm:w-auto"
        >
          Visit the Shop
        </a>

        <a
          href="{{route('events.index')}}"
          class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-orange-600 shadow hover:text-orange-700 focus:outline-none focus:ring active:text-orange-500 sm:w-auto"
        >
          School Events
        </a>
      </div>
    </div>
  </div>
</section>

</x-app-layout>
