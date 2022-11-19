<header
class="bg-blue-900 text-white sticky top-0 basis-[100%] lg:basis-1/6 lg:h-[100%]"
>
<nav class="flex flex-col">
  <!-- Logo app -->
  <div class="flex align-center">
    <div >
      <a href="/">
        <img
        class="h-[100px]"
        src="{{ Vite::asset('resources/images/logo.png') }}"
        />
      </a>
    </div>
    
  </div>

  <!-- container menu-->
  <div
    id="menu-container"
    class="h-0 lg:h-[100%] overflow-hidden flex flex-col"
  >
    <ul>
      <li class="p-3">
        <a class="mt-5 block md:ml-5" href="{{route('business.homepage',$business->id)}}">
          <div
            class="rounded-lg text-center flex p-3 hover:bg-blue-800"
          >
            <div > 
              <img
              src="{{ Vite::asset('resources/images/home.png') }}"
              />
            </div>
            <div class="ml-4 flex items-center"><h4>dashboardh</h4></div>
          </div>
        </a>
      </li>

      <li class="p-3">
        <h4 class="mt-4 p-3 text-slate-400">Gruppi <a href="{{route('business.page.custom-page.create',$business->id)}}">&#10133;</a></h5>
         
        <a class="mt-2 block md:ml-5" href="{{route('business.employees.index',$business->id)}}">
          <div
            class="rounded-lg text-center flex p-3 hover:bg-blue-800"
          >
            <div>
              <img
              src="{{ Vite::asset('resources/images/worker.png') }}"
              />
            </div>
            <div class="ml-4 flex items-center"><h1>Dipendenti</h1></div>
          </div>
        </a> 
        @foreach ($business->customPages as $customPage)
           <a class="mt-2 block md:ml-5" href="{{route('business.page.custom-page.show',[$business->id,$customPage->id])}}">
          <div
            class="rounded-lg text-center flex p-3 hover:bg-blue-800"
          >
            <div>
              <img
              src="{{ Vite::asset('resources/images/customer-support.png') }}"
              />
            </div>
            <div class="ml-4 flex items-center"><h1>{{$customPage->name}}</h1></div>
          </div>
        </a>  
        @endforeach
       
      </li>
    </ul>
  </div>
  <!-- toggle hamburger-->
  <div class="lg:hidden absolute right-0">
    <button onclick="toggleNav()">
      <div>
        <img
          src="https://img.icons8.com/ios-filled/50/000000/menu--v1.png"
        />
      </div>
    </button>
  </div>
</nav>
</header>
<script>
  const element = document.querySelector("#menu-container");
  function toggleNav() {
    element.classList.toggle("h-0");
  }
</script>