<article class="border rounded-lg shadow-md flex p-2">
  
    <form class="flex grow" action="{{route('business.page.tables.update',[$business->id,$card->custom_page_id,$card->id])}}" method="post">
     @csrf
     @method('PUT')

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{$columnNames->name_column_3}} :</h5>
        <h2 class="text-base"> <input
          name="column_3"
           class=" border-0"
          type="text"
          value={{$card->column_3}}
        /></h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{$columnNames->name_column_4}} :</h5>
        <h2 class="text-base">
          <input
          name="column_4"
          class=" border-0"
            type="text"
            value={{$card->column_4}}
          />
        </h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{$columnNames->name_column_5}} :</h5>
        <h2 class="text-base">
          <input
          name="column_5"
          class=" border-0"
            type="text"
            value={{$card->column_5}}
          />
        </h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{$columnNames->name_column_6}} :</h5>
        <h2 class="text-base">
          <input
          name="column_6"
          class=" border-0"
            type="text"
            value={{$card->column_6}}
          />
        </h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">
          {{$columnNames->name_column_1}} :
        </h5>
        <h2 class="text-base">
          <input
          name="column_1"
          class=" border-0"
            type="date"
            value= {{$card->column_1}}
          />
        </h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">
          {{$columnNames->name_column_2}} :
        </h5>
        <h2 class="text-base">
          <input
          name="column_2"
          class=" border-0"
            type="date"
            value= {{$card->column_2}}
          />
        </h2>
      </div>
      <div class="flex align-center justify-center">
        <button
          class="border rounded bg-orange-400 p-2 px-5 text-1xl"
          type="submit"
        >
          Edit
        </button>
      </div>
    </form>

    <form action="{{route('business.page.tables.destroy',[$business->id,$card->custom_page_id,$card->id])}}" 
     method="POST" class="flex align-center justify-center">
      @csrf
      @method('DELETE')
      <button
        class="border rounded bg-red-500 p-2 px-5 text-1xl"
        type="submit"
      >
        Elimina
      </button>
    </form>
  </article>