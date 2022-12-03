
<x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>
<div class="lg:flex gap-4 lg:min-h-[50vh]">
           
    <div class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll" >

    <article class="border rounded-lg shadow-md flex flex-col p-2 pt-5 relative h-full">
      
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

        <form class="flex grow flex-wrap pt-5" action="{{route('business.employees.store',$business->id)}}" method="post">
            @csrf
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Nome :</h5>
               <h2 class="text-base"> <input
                 name="name"
                  class=" border-0 border-b focus:ring-0"
                 type="text"
                 placeholder="Nome"
               /></h2>
             </div>
       
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Cognome :</h5>
               <h2 class="text-base">
                 <input
                 name="surname"
                 class=" border-0 border-b focus:ring-0" 
                   type="text"
                   placeholder="Cognome"
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
                    placeholder="Email"
                  />
                </h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">Ruolo :</h5>
                <h2 class="text-base">
                    <select name="role">
                        <option value="2">1 manager</option>
                        <option value="3">2 admin</option>
                        <option value="4">3 secretary senior</option>
                        <option value="5">4 secretary</option>
                        <option value="10">5 owner</option>
                    </select>
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
                    placeholder="Data di nascita"
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
                   
                 />
               </h2>
             </div>

             <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">
                 tipo contratto :
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
                    <input class="border-0 border-b focus:ring-0" type="number" name="hourly_pay" value="10"/>
                </h2>
              </div>


              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">
                 valuta pagamenti :
                </h5>
                <h2 class="text-base">
                    <input class="border-0 border-b focus:ring-0" type="text" name="currency" value="euro">
                </h2>
              </div>

             <div class="flex align-center justify-center  w-full ">
               <button
                 class="border rounded bg-green-300 p-2 px-5 text-1xl w-full m-auto md:w-1/2"
                 type="submit"
               >
                 Aggiungi dipendete
               </button>
             </div>
           </form>
       

    </article>

    </div>
</div>
