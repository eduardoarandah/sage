<header class="banner">
  <div class="container flex flex-col justify-between md:flex-row md:space-x-3 md:space-y-0 mx-auto p-3 space-y-2 md:py-4">

    <div class="md:w-1/3 h-full">
      <a class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate" href="{{ home_url('/') }}">
        @if ($headerLogo)
          {!! $headerLogo !!}
        @else
          {{ $siteName }}
        @endif
      </a>
    </div>

    @if (is_active_sidebar('header'))
      <div class="text-sm text-white tracking-wide flex p-2 space-x-3 text-sm text-white tracking-wide">
        @php dynamic_sidebar('header') @endphp
      </div>
    @endif

  </div>

  @if (has_nav_menu('primary_navigation'))
    <div class="bg-gray-700">
      <div class="container mx-auto flex justify-between items-center">
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
        @include('partials.search-button')
      </div>
    </div>
  @endif
</header>
