<article @php(post_class())>
  <header>
    @include('partials.featured-image',[ 'post' => get_post(), 'size' => 'thumbnail' ])
    <h2 class="entry-title text-lg mt-2">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>

    @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
