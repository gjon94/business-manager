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
    
    <body class="lg:h-screen glassEffect">
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

html {
    background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1124&q=100');
    background-position: center;
    background-size: contain
}
.glassEffect{
                backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(17, 25, 40, 0.75);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
            }
        </style>
    </body>

</html>