<header class="banner">
  <div class="container mx-auto px-3 py-8">
    <a class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate" href="{{ home_url('/') }}">
      @if ($headerLogo)
        {!! $headerLogo !!}
      @else
        {{ $siteName }}
      @endif
    </a>
  </div>

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header>
