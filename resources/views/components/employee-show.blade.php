
<x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>
<div class="lg:flex gap-4 lg:min-h-[50vh]">
           
    <div class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll" >
   <!--Errors -->

   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li class="text-red-500">{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
     <!--Errors -->

    <article class="border rounded-lg shadow-md flex flex-col p-2 pt-5 relative h-full">
     
        <form class="flex grow flex-wrap pt-5" action="{{route('business.employees.update',[$business->id,$employee->id])}}" method="post">
            @csrf 
            @method('patch')
       
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Nome :</h5>
               <h2 class="text-base"> <input
                 name="name"
                  class=" border-0 border-b focus:ring-0"
                 type="text"
                 value={{$employee->name}}
               /></h2>
             </div>
       
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Cognome :</h5>
               <h2 class="text-base">
                 <input
                 name="surname"
                 class=" border-0 border-b focus:ring-0"
                   type="text"
                   value={{$employee->surname}}
                 />
               </h2>
             </div>

             <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">Email :</h5>
                <h2 class="text-base">
                  <input
                  
                  name="email_work"
                  class=" border-0 border-b focus:ring-0"
                    type="email"
                    placeholder={{($employee->email_work)?$employee->email_work:"no-mail"}}
                    value=""
                  />
                </h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">Ruolo :</h5>
                <h2 class="text-base">
                  <input
                  
                  {{auth()->user()->role < $employee->role?"":"disabled "}}
                  
                  name="role"
                  class=" border-0 border-b focus:ring-0"
                    type="number"
                    value={{$employee->role}}
                  />
                </h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">
                  data di nascita :
                </h5>
                <h2 class="text-base">
                  <input
                  name="birthday"
                  class=" border-0 border-b focus:ring-0"
                    type="date"
                    value={{$employee->birthday}}
                  />
                </h2>
              </div>
       
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">
                 inizio contratto :
               </h5>
               <h2 class="text-base">
                 <input
                 name="start_time"
                 class=" border-0 border-b focus:ring-0"
                   type="date"
                   value={{$contract->start_time}}
                 />
               </h2>
             </div>

             
       
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">
                fine contratto :
               </h5>
               <h2 class="text-base">
                 <input
                 name="end_time"
                 class=" border-0 border-b focus:ring-0"
                   type="date"
                   value={{$contract->end_time}}
                 />
               </h2>
             </div>

             <div class="grow w-full sm:w-1/2 md:w-1/4">
              <h5 class="text-xs text-slate-400">
               fine contratto :
              </h5>
              <h2 class="text-base">
                <select class="" name="contract_type_id">
                  <option selected value="1">indeterminato</option>
                  <option  value="2">partime</option>
              </select>
              </h2>
            </div>

             <div class="grow w-full sm:w-1/2 md:w-1/4">
              <h5 class="text-xs text-slate-400">
                paga oraria :
              </h5>
              <h2 class="text-base">
                <input
                name="hourly_pay"
                class=" border-0 border-b focus:ring-0"
                  type="number"
                  value={{$contract->hourly_pay}}
                />
              </h2>
            </div>

            <div class="grow w-full sm:w-1/2 md:w-1/4">
              <h5 class="text-xs text-slate-400">
                valuta :
              </h5>
              <h2 class="text-base">
                <input
                name="currency"
                class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$contract->currency}}
                />
              </h2>
            </div>

             <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">
                 entrato in azienda :
                </h5>
                <h2 class="text-base">
                  <input
                  disabled
                  name="#"
                  class=" border-0 border-b focus:ring-0"
                    type="date"
                    value={{$employee->created_at}}
                  />
                </h2>
              </div>

             <div class="flex align-center justify-center  w-full ">
               <button
                 class="border rounded bg-green-300 p-2 px-5 text-1xl w-full m-auto md:w-1/2"
                 type="submit"
               >
                 Aggiorna
               </button>
             </div>
           </form>
       
           <form action="{{route('business.employees.destroy',[ $business->id,$employee->id])}}" 
            method="POST" class="flex align-center justify-center absolute right-2 top-2">
            @csrf
            @method('delete')
             <button
               class="border rounded bg-red-500 p-2 px-5 text-1xl"
               type="submit"
             >
               Licenzia
             </button>
           </form>

    </article>

    </div>
</div>
