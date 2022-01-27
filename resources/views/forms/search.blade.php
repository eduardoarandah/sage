<form role="search" method="get" class="search-form bg-white mt-10" action="{{ home_url('/') }}">
  <span class="sr-only">
    {{ _x('Search for:', 'label', 'sage') }}
  </span>
  <div class="border border-gray-200 flex flex-col md:flex-row">
    <div class="flex flex-1 items-center  px-4 rounded w-full">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search__icon dark:text-slate-500">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
      <input class="outline-none pl-3 text-blueGray-400 text-xs w-full h-10" type="search" placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s">
    </div>
    <button class="bg-gray-700 font-semibold hover-up-2 hover:bg-gray-800 leading-none md:ml-6 md:w-auto px-8 py-4 text-white text-xs w-full" type="submit">{{ __('Search', 'sage') }}</button>
  </div>
</form>
