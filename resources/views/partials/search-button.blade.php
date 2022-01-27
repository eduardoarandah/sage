<div class="relative" x-data="{ open: false }">

  <label @click="open = ! open" for="search-input" class="flex flex-none h-10 items-center pr-3">
    <span class="sr-only">search</span>
    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white group-focus-within:text-gray-200 hover:text-gray-400 cursor-pointer">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
    </svg>
  </label>

  <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute bg-white border-gray-700 p-4 right-0 shadow-md top-full w-96">
    <form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
      <div class="border border-gray-200 flex flex-col md:flex-row">
        <div class="flex flex-1 items-center md:w-2/3 px-4 rounded w-full">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search__icon dark:text-slate-500">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input class="outline-none pl-3 text-blueGray-400 text-xs w-full h-10" type="search" placeholder="Busca en el sitio" value="{{ get_search_query() }}" name="s">
        </div>
        <button class="bg-gray-700 font-semibold hover-up-2 hover:bg-gray-800 leading-none md:ml-6 md:w-auto px-8 py-4 text-white text-xs w-full" type="submit">Buscar</button>
      </div>
    </form>
  </div>

</div>
