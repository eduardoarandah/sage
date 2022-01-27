@if (count($posts))
  <div class="grid gap-4 md:grid-cols-3 lg:gap-8">
    @foreach ($posts as $post)
      <div itemscope itemtype="https://schema.org/NewsArticle">
        <div itemprop="image">
          <a href="{{ $post->permalink }}" rel="bookmark" title="{{ $post->post_title }}">{!! $post->rendered_thumbnail !!}</a>
        </div>
        <div class="w-full py-3">
          <a class="block mt-1 font-semibold leading-tight text-lg tracking-wide" href="{{ $post->permalink }}" rel="bookmark" title="{{ $post->post_title }}">{{ $post->post_title }}</a>
        </div>
      </div>
    @endforeach
  </div>
@endif
