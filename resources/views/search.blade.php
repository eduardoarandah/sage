@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <div class="grid md:grid-cols-2 gap-8 justify-center">
    @while(have_posts()) @php(the_post())
      @include('partials.content-search')
    @endwhile
  </div>

@if(function_exists('wp_pagenavi'))
  @php(wp_pagenavi())
  @else
    {!! get_the_posts_navigation() !!}
@endif
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
