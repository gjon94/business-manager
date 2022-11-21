<x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>

<div class="lg:flex gap-4 lg:min-h-[50vh]">
           
    <div class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll" >

    <article class="border rounded-lg shadow-md flex flex-col p-2 pt-5 relative h-full">
      
        <form class="flex grow flex-wrap pt-5" action="{{route('business.page.customPage.store',$business->id)}}" method="post">
           @csrf
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Nome grppo:</h5>
               <h2 class="text-base"> <input
                 name="name"
                  class=" border-0 border-b focus:ring-0"
                 type="text"
                 required
                 placeholder="Nome"
               /></h2>
             </div>
    

             <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">descizione :</h5>
                <h2 class="text-base"> <input
                  name="description"
                  required
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  placeholder="descrizione"
                /></h2>
              </div>



              <!-- column names -->

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 1 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_1"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  placeholder="Data inizio"
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_2"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  placeholder="scadenza"
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_3"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  placeholder="Nome task"
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_4"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  placeholder="ulteriore info task"
                /></h2>
              </div>

            

 

     



          

             <div class="flex align-center justify-center  w-full ">
               <button
                 class="border rounded bg-green-300 p-2 px-5 text-1xl w-full m-auto md:w-1/2"
                 type="submit"
               >
                 crea gruppo
               </button>
             </div>
           </form>
       

    </article>

    </div>
</div>
