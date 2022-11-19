

    <x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>
      <!-- container deadlines and news-->
      <div class="lg:flex gap-4 lg:h-[50vh]">
        @if (auth()->user()->role < 5)
            
        <!-- business deadlines-->
        <div
        class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll"
        >
        <h1 class="font-bold text-2xl text-blue-800 mb-5">Scadenze:</h1>
        <div class="flex flex-col gap-2">
          @foreach ($deadlines as $deadline)
          <x-main-section-components.deadline :deadline="$deadline"></x-main-section-components.deadline>
          @endforeach
          
          
        </div>
      </div>
      
      <!-- end business deadlines-->
      @endif

        <!-- business internal news -->
        <div
          class="flex flex-col lg:w-[15rem] gap-2 bg-white pb-5 p-3 lg:overflow-hidden lg:overflow-y-scroll"
        >
          <!--header internal news -->
          <div class="mb-5">
            <h1 class="font-bold text-2xl text-blue-800">
              Aggiornamenti aziendali
            </h1>
          </div>
          <div class="grow flex flex-col gap-3">
            <article class="bg-white border rounded-lg shadow-md">
              <!-- cont img name options posts-->
              <div
                class="flex justify-between h-[5rem] p-3 lg:h-[3rem] lg:p-1"
              >
                <div class="flex">
                  <!-- img -->
                  <div class="h-[inherit] rounded-full overflow-hidden">
                    <img
                      class="h-[100%] object-cover aspect-square"
                      src="https://www.mantotman.nl/files/styles/tile_small/public/2022-07/66196689_s.jpg?h=b44d6655&itok=26vViPPW"
                      alt=""
                    />
                  </div>
                  <!-- name and date-->
                  <div class="ml-3">
                    <h1 class="text-xl">carlo</h1>
                    <h4 class="text-xs text-cyan-700">13:30 28/05/23</h4>
                  </div>
                </div>
                <!-- option post-->
                <button>opzioni</button>
              </div>

              <a href="">
                <div class="p-3">
                  <p class="text-xs">
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Voluptatem nemo ad est, cupiditate officia totam
                    assumenda pariatur vitae omnis quod eveniet qui corporis
                    incidunt! Iure ipsam mollitia explicabo earum vero.
                  </p>
                </div>
              </a>
            </article>
          </div>
        </div>
        <!-- end business internal news -->
      </div>
      <!-- end container deadlines and news-->
  