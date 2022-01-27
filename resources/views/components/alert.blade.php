<div {{ $attributes->merge(['class' => $type]) }}>
  <div class="p-4 text-2xl">
    {!! $message ?? $slot !!}
  </div>
</div>
