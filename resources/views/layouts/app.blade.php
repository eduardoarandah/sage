<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

<div class="page-layout__content container mx-auto px-3 py-8 md:flex space-y-10 md:space-x-5 lg:space-x-10 bg-gray-100">

  @hasSection('sidebar')
    <main class="main md:w-8/12">
      @yield('content')
    </main>
    <aside class="sidebar md:w-4/12">
      @yield('sidebar')
    </aside>
  @else
    <main class="main w-full">
      @yield('content')
    </main>
  @endif
</div>

@include('sections.footer')
