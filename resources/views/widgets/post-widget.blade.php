<p>
  <label for="{{ $cat["id"] }}">Categoría</label>
  <br>
  @php
    wp_dropdown_categories([
      'id' => $cat['id'],
      'name' => $cat['name'],
      'selected' => $cat['value'],
      'show_option_all' => '--Todas las categorías--',
      'orderby' => 'name',
      'order' => 'ASC' ]);
    @endphp
</p>

<p>
  <label for="{{ $author["id"] }}">Autor</label>
  <br>
  @php
    wp_dropdown_users([
      'id' => $author['id'],
      'name' => $author['name'],
      'selected' => $author['value'],
      'show_option_all' => '--Cualquier Autor--'
    ]);
  @endphp
</p>

<p>
  <label for="{{ $posts_per_page["id"] }}">Cantidad de notas</label>
  <input
    type="text"
    class="widefat"
    id="{{ $posts_per_page['id'] }}"
    name="{{ $posts_per_page['name'] }}"
    value="{{ $posts_per_page['value'] ?? $posts_per_page['default'] }}"
    >
</p>

<p>
  <label for="{{ $offset["id"] }}">Omitir cuántas notas</label>
  <input
    type="text"
    class="widefat"
    id="{{ $offset['id'] }}"
    name="{{ $offset['name'] }}"
    value="{{ $offset['value'] ?? $offset['default'] }}"
    >
</p>

<p>
  <label for="{{ $thumbnail_size["id"] }}">Tamaño de imagen</label>
  <br>
  <select
    id="{{ $thumbnail_size['id'] }}"
    name="{{ $thumbnail_size['name'] }}"
    >
    @foreach (\App\Helpers::getImageSizes() as $value => $image_size)
      <option
        value="{{ $value }}"
        {{ $value == $thumbnail_size['value'] ? 'selected' : '' }}
        >
        {{ ucfirst($value) }}
        ({{ $image_size['width'] }} {{ $image_size['height'] }} {{ $image_size['crop']? 'crop' : ''}})
      </option>
    @endforeach
  </select>
</p>

<p>
  <label for="{{ $excerpt_words["id"] }}">Longitud del resumen en numero de palabras</label>
  <input
    type="text"
    class="widefat"
    id="{{ $excerpt_words['id'] }}"
    name="{{ $excerpt_words['name'] }}"
    value="{{ $excerpt_words['value'] ?? $excerpt_words['default'] }}"
    >
</p>

<p>
  <label for="{{ $structure_file["id"] }}">Estructura</label>
  <br>
  <select
    id="{{ $structure_file['id'] }}"
    name="{{ $structure_file['name'] }}"
    >
    <option value="">Seleccionar</option>
    @foreach ($templates as $template)
      <option
        value="{{ $template }}"
        {{ $template == $structure_file['value'] ? 'selected' : '' }}
        >
        {{ $template }}
      </option>
    @endforeach
  </select>
</p>

