<div>
  <label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio" id="experience-all" name="{{ $name }}" value=""
      {{ !request($name) ? 'checked' : '' }}>
    <span class="ml-2">すべて</span>
  </label>
  @foreach ($options as $option)
    <label for="{{ $name }}" class="mb-1 flex items-center">
      <input type="radio" id="experience-entry" name="{{ $name }}" value="{{ $option }}"
        @checked($option === request($name))>
      <span class="ml-2">{{ $option }}</span>
    </label>
  @endforeach


</div>
