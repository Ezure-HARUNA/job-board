<nav {{ $attributes }}>
  <ul class="flex space-x-4 text-slate-500">
    <li>
      <a href="/">トプ画に戻る</a>
    </li>

    @foreach ($links as $label => $link)
      <li>→</li>
      <li>
        <a href="{{ $link }}">
          {{ $label }}
        </a>
      </li>
    @endforeach
  </ul>
</nav>
