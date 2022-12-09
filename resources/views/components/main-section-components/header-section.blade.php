      <!-- dashboard head -->
      <div class="h-[4rem] flex justify-between">
        <!-- business name -->
        <div class="h-[inherit] flex align-center gap-5 p-1 min-w-[15rem]">
          <div class="border h-[100%] rounded-full overflow-hidden">
            <img
              class="object-cover h-[inherit] aspect-square"
              src="https://michelemariatammaro.it/wp-content/uploads/2019/07/Logo-MMT.jpg"
              alt="user-profile-photo"
            />
          </div>

          <div class="grow flex flex-col justify-center">
            <h1 class="text-4xl font-bold text-blue-800">{{$business->name}}</h1>
          </div>
        </div>

        <!-- user dropdown-->
        <div
          class="hidden lg:inline-flex h-[inherit] bg-white flex align-center gap-5 p-2 min-w-[15rem] border rounded-lg shadow-md"
        >
          <div
            class="h-[100%] border rounded-full overflow-hidden shadow-lg"
          >
          @switch(auth()->user()->type)
              @case('owner')
                   <a class="h-[inherit]" href="{{route('dashboard')}}">
            <img
              class="object-cover h-[inherit] aspect-square"
              src="https://cdn.gingergeneration.it/uploads/2020/08/jisoo.jpg"
              alt="user-profile-photo"
            />
          </a>
                  @break
              @case('employee')
              <a class="h-[inherit]" href="{{route('employee.login')}}">
                <img
                  class="object-cover h-[inherit] aspect-square"
                  src="https://cdn.gingergeneration.it/uploads/2020/08/jisoo.jpg"
                  alt="user-profile-photo"
                />
              </a>
                  @break
              @default
                  
          @endswitch
         
            
          </div>

          <div class="grow flex flex-col justify-center">
            <h1 class="text-xl font-bold">{{auth()->user()->name}}</h1>
            <p class="text-sm text-green-500">{{auth()->user()->role}}</p>
          </div>

          <!--logout -->
          
           <form action="{{ route('logout') }}" method="post" class="flex items-center">
            @csrf
            <button type="submit"><img
              src="{{ Vite::asset('resources/images/exit.png') }}"
              /></button>
           </form>
          
        </div>
      </div>
      <!-- end dashboard head -->