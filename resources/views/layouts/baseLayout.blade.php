<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="lg:h-screen bg-blue-900">
        <main class="flex flex-wrap lg:flex-nowrap p-4 gap-4 lg:h-[100%]">
            {{$header}}
            <section class="grow rounded-[1.5rem] bg-slate-100 lg:h-[100%] p-3">
              <div
                id="MAIN-DIV"
                class="overflow-hidden lg:overflow-y-scroll lg:h-[100%] p-3 flex flex-col space-y-8"
              >
              
           {{$slot}}
          
              </div>
            </section>
           
           
        </main>
        <style>
            ::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  border-radius: 100vh;
}

::-webkit-scrollbar-thumb {
  background: #857f83;
  border-radius: 100vh;
}
        </style>
    </body>

</html>