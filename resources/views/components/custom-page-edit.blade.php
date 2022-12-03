<x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>

<div class="lg:flex gap-4 lg:min-h-[50vh]">
           
    <div class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll" >

    <article class="border rounded-lg shadow-md flex flex-col p-2 pt-5 relative h-full">
      
        <form class="flex grow flex-wrap pt-5" action="{{route('business.page.customPage.update',[$business->id,$customPage])}}" method="post">
           @csrf
           @method('PATCH')
             <div class="grow w-full sm:w-1/2 md:w-1/4">
               <h5 class="text-xs text-slate-400">Nome grppo:</h5>
               <h2 class="text-base"> <input
                 name="name"
                  class=" border-0 border-b focus:ring-0"
                 type="text"
                 value={{$customPage->name}}
               /></h2>
             </div>
    

             <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">descizione :</h5>
                <h2 class="text-base"> <input
                  name="description"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$customPage->description}}
                /></h2>
              </div>



              <!-- column names -->

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 1 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_1"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_1}}
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_2"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_2}}
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_3"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_3}}
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_4"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_4}}
                /></h2>
              </div>

              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_5"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_5}}
                /></h2>
              </div>


              <div class="grow w-full sm:w-1/2 md:w-1/4">
                <h5 class="text-xs text-slate-400">nome colonna 2 :</h5>
                <h2 class="text-base"> <input
                  name="name_column_6"
                   class=" border-0 border-b focus:ring-0"
                  type="text"
                  value={{$columnNames->name_column_6}}
                /></h2>
              </div>

            
          

             <div class="flex align-center justify-center  w-full ">
               <button
                 class="border rounded bg-green-300 p-2 px-5 text-1xl w-full m-auto md:w-1/2"
                 type="submit"
               >
                 Salva modifiche
               </button>
             </div>
           </form>
       

    </article>

    </div>
</div>
