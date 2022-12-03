

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
          <!--display errores -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                 <li><h5 class="text-2l text-red-700">{{ $error }}</h5></li>
                 @endforeach
               </ul>
            </div>
         @endif

          <!-- -->

          @forelse ($deadlines as $deadline)
          <x-main-section-components.deadline :deadline="$deadline"></x-main-section-components.deadline>



          @empty
              <h1 class="text-2xl">Non ci sono scadenza </h1>
          
          @endforelse
          
          
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
               <!-- create post form -->
            <x-main-section-components.post-form></x-main-section-components.post-form>
            </h1>
          </div>
          <div class="grow flex flex-col gap-3">
           
            @foreach ($posts as $post)
            <x-main-section-components.post-card :post="$post"></x-main-section-components.post-card>
                
            @endforeach
            
          </div>
        </div>
        <!-- end business internal news -->
      </div>
      <!-- end container deadlines and news-->
  