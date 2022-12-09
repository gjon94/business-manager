<x-personal-profile>
  
   
    <header class="glassEffect p-4">
      <ul class="flex   justify-between items-center">
          <li class=" ">
            <a class="block " href="/">
              <div class="h-[100px]">
                  <img class="h-full" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
              </div>
            </a>
          </li>
  
          <li>
              <form action="{{ route('logout') }}" method="post" class=" flex items-center">
              @csrf
              <button type="submit"><img
                src="{{ Vite::asset('resources/images/exit.png') }}"
                /></button>
             </form>
          </li>
          
      </ul>
    </header>
  
    <section class="glassEffect p-4 text-white text-lg">
      <h1 class="text-lg text-white">Ciao {{auth()->user()->name}}</h1>
      lista delle tue aziende:
      <ul>
        @foreach ($business as $item)
           <li><a href="{{route('business.homepage',$item->id)}}">{{$item->name}}</a></li>
        @endforeach
      </ul>
      <h1 class="text-lg text-white">La tua pagina è in manutenzione , torna in unaltro momento</h1>
    </section>
  
     </x-personal-profile>