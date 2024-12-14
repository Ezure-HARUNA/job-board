<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>求人サイト</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-cyan-500 to-blue-500 text-slate-700">
  <nav class="mb-8 flex justify-between text-lg font-medium">
    <ul class="flex space-x-2">
      <li>
        <a href="{{ route('jobs.index') }}"><i class="fas fa-home mr-2"></i>求人サイトトップ</a>
      </li>
    </ul>
    <ul class="flex space-x-2">
      @auth
        <li>
          <a href="{{ route('my-job-applications.index') }}">
            {{ auth()->user()->name ?? 'ゲストユーザー' }}
          </a>
        </li>
        <li>
          <form x-data="{ open: false }"
            @submit.prevent="open = confirm('本当にログアウトしますか？'); if (open) { $event.target.submit(); }"
            action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">ログアウト</button>
          </form>
        </li>
      @else
        <li>
          <a href="{{ route('auth.create') }}">ログイン</a>
        </li>
      @endauth
    </ul>
  </nav>
  @if (session('success'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
      <p class="font-bold">成功！</p>
      <p>{{ session('success') }}</p>
    </div>
  @endif
  @if (session('error'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
      <p class="font-bold">失敗!</p>
      <p>{{ session('error') }}</p>
    </div>
  @endif
  {{ $slot }}
</body>

</html>
