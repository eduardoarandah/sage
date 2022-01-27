<footer class="bg-gray-700 text-white ">
  <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8 flex flex-col space-y-6">

    @if (is_active_sidebar('sidebar-footer'))
      <div class="text-sm sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0 flex justify-center mt-8">
        @php dynamic_sidebar('sidebar-footer') @endphp
      </div>
    @endif

    <nav class="flex flex-wrap justify-center" aria-label="Footer">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav flex flex-wrap justify-center space-x-4', 'link_before' => '<span class="text-gray-500 hover:text-gray-900">', 'link_after' => '</span>', 'echo' => false]) !!}
      @endif
    </nav>

    <div class="flex justify-center space-x-6">
      <x-social-icons></x-social-icons>
    </div>

    <p class="text-center text-base text-gray-400">
      &copy; {{ date('Y') }} All rights reserved.
    </p>

  </div>
</footer>
