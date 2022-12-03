
      <x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>
      <div class="lg:flex gap-4 lg:min-h-[50vh]">
           
            <div
            class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll"
            >
            <h1 class="font-bold text-3xl text-blue-800">Dipendenti:</h1>
            <h5 class=" text-2xl text-slate-800">
              lista dipendenti
            </h5>
            <a class="text-1xl" href="{{route('business.employees.create',$business->id)}}">Aggiungi nuovo dipendente &#10133;</a>

            <div class="flex flex-col gap-2 mt-5">

                  @foreach ($employees as $employee)
                  <x-main-section-components.employee-card :employee="$employee" :businessId="$business->id"></x-main-section-components.employee-card>
                  @endforeach
                  
                 
                  
                  
                  
            </div>
            
      </div>
      </div>

  