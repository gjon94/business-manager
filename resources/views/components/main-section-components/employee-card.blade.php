
<a href="{{route('business.employees.show',[$businessId,$employee->id])}}" class="border rounded-lg shadow-md flex p-2" >
<article class="flex grow flex-wrap">
  

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
          {{$employee->role}}
        </h2>
      </div>

      <div class="grow w-2/5 mt-3 md:w-1/5">
        <h5 class="text-sm text-slate-500">
          Fine Contratto :
        </h5>
        <h2 class="text-base">
         11/05/2022
        </h2>
      </div>


    

  </article>
</a>