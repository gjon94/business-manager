
      <x-main-section-components.header-section :business="$business"></x-main-section-components.header-section>

      <!-- container deadlines and news-->
      <div class="lg:flex gap-4 lg:min-h-[50vh]">
        <!-- business deadlines-->
        <div
          class="border bg-white p-3 grow lg:overflow-hidden lg:overflow-y-scroll"
        >
        
       
          <h1 class="font-bold text-3xl text-blue-800">{{$customPage->name}}:
             <a href="{{route('business.page.custom-page.edit',[$business->id,$customPage->id])}}">&#9999;</a></h1>
         
      
          
          <h5 class="text-1xl text-slate-800">
            {{$customPage->description}}
          </h5>

          <div style="mt-5 ">
            <form action="{{route('business.page.tables.store',[$business->id,$customPage->id])}}" method="post"
              class="mt-5 flex justify-between items-center">
              @csrf
              <div class="flex flex-col relative">
                <label class="text-xs text-slate-400 absolute left-1 top-1" for="column_1">{{$columnNames->name_column_1}}</label>
              <input type="date" name="column_1" class="pt-4">
              </div>
      
              <div class="flex flex-col relative">
                <label class="text-xs text-slate-400 absolute left-1 top-1" for="column_2">{{$columnNames->name_column_2}}</label>
              <input type="date" name="column_2" class="pt-4">
              </div>
              
    
              <div class="flex flex-col relative">
                <label class="text-xs text-slate-400 absolute left-1 top-1" for="column_3">{{$columnNames->name_column_3}}</label>
              <input type="text" name="column_3" class="pt-4">
              </div>
              
    
              <div class="flex flex-col relative">
                <label class="text-xs text-slate-400 absolute left-1 top-1" for="column_4">{{$columnNames->name_column_4}}</label>
              <input type="text" name="column_4" class="pt-4">
              </div>
              
              <div>
                <button class="border rounded bg-green-400 p-2 px-5 text-1xl" type="submit">crea</button>

              </div>
            </form>
          </div>

          

          <div class="flex flex-col gap-2 mt-5">
           @foreach ($customTables as $card)
           <x-main-section-components.custom-page-card :business="$business" :columnNames="$columnNames" :card="$card" ></x-main-section-components.custom-page-card>
               
           @endforeach
                
            
           
          </div>
        </div>

        <!-- end business deadlines-->
      </div>
      <!-- end container deadlines and news-->
