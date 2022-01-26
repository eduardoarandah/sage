<a href="{{ get_permalink($post) }}">
  @if (has_post_thumbnail($post))
    {!! get_the_post_thumbnail($post, $size,['class'=>'entry-thumbnail w-full animated fadeIn']) !!}
  @else
    @php($default_image = get_option('default_image'))
    @if ($default_image)
      {!! wp_get_attachment_image(get_option('default_image'), $size, false, ['class' => 'entry-thumbnail w-full animated fadeIn'])  !!}
    @endif
  @endif
</a>
