<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>求人サイト</title>
  @vite('resources/css/app.css')
</head>

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-700">
  {{ $slot }}
</body>

</html>
