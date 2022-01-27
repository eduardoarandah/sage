<article @php(post_class())>
  <header>
    <h1 class="entry-title text-3xl md:text-4xl lg:text-5xl font-title font-semibold mb-10 leading-tight">
      {!! $title !!}
    </h1>
    @include('partials.featured')
    <div class="flex justify-center space-x-3 mt-3">
      <x-social-share :post="get_post()"></x-social-share>
    </div>
    <div class="mt-4">
      @include('partials.entry-meta')
    </div>
  </header>

  <div class="entry-content mt-2 prose lg:prose-lg">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
