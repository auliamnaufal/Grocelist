<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }

    .video-docker video {
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .video-docker::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: 1;
    }

    .video-content {
      z-index: 2;
    }
  </style>
</head>

<body class="antialiased">
  <section class="relative h-screen flex flex-col items-center justify-center text-center text-white py-0 px-3">
    <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
      <video class="min-w-full min-h-full absolute object-cover" src="/videos/hero_vid.mp4" type="video/mp4"
        autoplay muted loop></video>
    </div>
    <div class="video-content space-y-2">
      <div class="relative flex items-top justify-center sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-500 px-4 py-2 rounded bg-white">Dashboard</a>
            @else
              <a href="{{ route('login') }}" class="text-sm text-gray-500 px-4 py-2 rounded bg-white">Log in</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}"
                  class="ml-4 text-sm text-gray-500 px-4 py-2 rounded bg-white">Register</a>
              @endif
            @endauth
          </div>
        @endif
      </div>
      <h1 class="font-light text-6xl">Grocerlist</h1>
      <h3 class="font-light text-3xl">List all of your groceries needs</h3>
    </div>
  </section>

</body>

</html>
