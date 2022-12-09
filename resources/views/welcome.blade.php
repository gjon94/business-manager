<!DOCTYPE html>
<html lang="en" class="overflow-y-scroll">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    
    <title>Document</title>
  </head>
  <body class="relative text-white overflow-x-hidden">
    <header class="fixed top-0 p-5 w-full bg-gradient-to-b from-black z-50">
      <ul class="flex items-center justify-between">
        <li>
          <a href="#" class="block max-h-[100px] max-w-[150px]">
            <img class="h-full w-full" src="{{ Vite::asset('resources/images/logo.png') }}" alt="businesslogo" />
          </a>
        </li>
        <li>
          <ul class="flex gap-5">
            @auth
           <li> <a href="{{ url('/dashboard') }}" class="text-sm   underline">{{auth()->user()->name}}</a></li>
           <li> <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
            </form>
        </li>
        @else
            <a href="{{ route('login') }}" class="text-sm   underline">Entra come imprenditore</a>
            <a href="{{ route('employee.login') }}" class="text-sm   underline">entra come dipendente</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm   underline">Register</a>
            @endif
        @endauth
          </ul>
        </li>
      </ul>
    </header>
    <main class="flex flex-col gap-10">
      <div class="h-[85vh] relative" style="z-index: -100">
        <!--video wrapper-->
        <div class="absolute h-full w-full">
          <video autoplay muted loop class="h-[100%] w-[100%] object-cover">
            <source src="{{ Vite::asset('resources/images/video-bg2.mp4') }}" type="video/mp4" />
          </video>
        </div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div
          class="h-full relative flex gap-5 items-center flex-col justify-center text-center"
        >
          <h1
            data-aos="fade-up"
            data-aos-duration="1000"
            class="text-4xl sm:text-9xl"
          >
            Business Manager
          </h1>
          <h3
            data-aos="fade-up"
            data-aos-duration="2000"
            class="text-2xl sm:text-3xl"
          >
            app gratuita per le piccole e medie imprese
          </h3>
        </div>
      </div>

      <!-- first section-->
      <div
        data-aos="fade-right"
        data-aos-duration="1200"
        class="relative h-[70vh] flex justify-evenly md:mt-[15vh] overflow-hidden"
      >
        <div class="relative h-[inherit]">
          <img class="h-[inherit] object-cover" src="{{ Vite::asset('resources/images/sec1.jpg') }}" alt="" />
          <div class="absolute md:relative inset-0 bg-black opacity-50"></div>
        </div>
        <div
          data-aos="fade-up"
          data-aos-duration="1000"
          class="absolute inset-0 flex gap-5 items-center flex-col justify-center text-center md:relative md:text-black"
        >
          <h1 class="text-5xl md:text-8xl">Gestisci in un click</h1>
          <h5 class="text-1xl md:text-3xl">
            Contratti dipendenti,bustepaghe..
          </h5>
        </div>
      </div>
      <!-- end first section-->

      <!-- second section-->
      <div
        data-aos="fade-left"
        data-aos-duration="1200"
        class="relative h-[70vh] flex flex-row-reverse justify-evenly md:mt-[15vh] overflow-hidden"
      >
        <div class="relative h-[inherit]">
          <img class="h-[inherit] object-cover" src="{{ Vite::asset('resources/images/sec2.jpg') }}" alt="" />
          <div class="absolute md:relative inset-0 bg-black opacity-50"></div>
        </div>
        <div
          data-aos="fade-up"
          data-aos-duration="1000"
          class="absolute inset-0 flex gap-5 items-center flex-col justify-center text-center md:relative md:text-black"
        >
          <h1 class="text-5xl md:text-8xl">Tieni traccia di tutto</h1>
          <h5 class="text-1xl md:text-3xl">Pagamenti, mezzi, cantieri ..</h5>
        </div>
      </div>
      <!-- end second section-->

      <footer class="bg-black h-[25vh] flex items-center justify-center">
        <h1 class="text-3xl text-center">
          © 2022 Business manager. All rights reserved.
        </h1>
      </footer>
    </main>

    <!-- footer-->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>