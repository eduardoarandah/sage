<div class="featured-object mb-5">
  @if ($youtube_embed)
<div class="embed-responsive embed-responsive-16by9" style="background: url(@asset('images/loading.gif')) center center no-repeat">
      <iframe
        class='embed-responsive-item' src='{{ $youtube_embed}}'
        frameborder='0'
        allowfullscreen></iframe>
    </div>
  @elseif ($embed)
    <div class="embed-responsive embed-responsive-16by9">{!! $embed !!}</div>
  @elseif($thumbnail)
    <div class="thumbnail-wrapper">
      {!! $thumbnail !!}
    </div>
    @if ($caption)
      <div class="wp-caption-text">{{$caption}}</div>
    @endif
  @endif
</div>

