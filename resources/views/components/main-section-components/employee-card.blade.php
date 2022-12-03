
<a href="{{auth()->user()->role < $employee->role? route('business.employees.show',[$businessId,$employee->id]):'#'}}" class="border rounded-lg shadow-md flex p-2" >
<article class="flex grow flex-wrap relative">
  
  @if (auth()->user()->role >= $employee->role)
      @include('components/littles/notAllowedFordEdit')
  @endif


      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm  text-slate-500">Nome:</h5>
        <h2 class="text-base">{{$employee->name}}</h2>
      </div>

      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm text-slate-500">cognome :</h5>
        <h2 class="text-base">
          {{$employee->surname}}
        </h2>
      </div>

      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm text-slate-500">Email :</h5>
        <h2 class="text-base">
          {{($employee->email)?$employee->email:"nessuna mail"}}
        </h2>
      </div>

      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm text-slate-500">Ruolo :</h5>
        <h2 class="text-base">
          
          @switch($employee->role)
              @case(2)
                  Manager
                  @break
              @case(3)
                  Admin
                  @break
                  @case(4)
                  secretarySenior
                  @break
                  @case(5)
                  secretary
                  @break
              @default
              employee
          @endswitch
        </h2>
      </div>

      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm text-slate-500">
          Fine Contratto :
        </h5>
        <h2 class="text-base">
         {{$employee->end_time}}
        </h2>
      </div>


    

  </article>
</a>