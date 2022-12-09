

<a href={{(isset($deadline->type))?route('business.employees.index',request()->business):
route('business.page.customPage.show',[request()->business,$deadline->customPageId])}}>

    <article class="p-2 border rounded-lg shadow-md flex item-card 
    {{ strtotime($deadline->end_time) < strtotime('15 days')?'bg-red-300':''}}">
      <div class="grow">
        <h5 class="text-xs text-slate-400">Gruppo :</h5>
        <h2 class="text-base">{{(isset($deadline->type))?"dipendete":$deadline->customPageName}}</h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{(property_exists($deadline, 'name_column_3'))?$deadline->name_column_3:'Nome'}} :</h5>
        <h2 class="text-base">{{$deadline->column_3}}</h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{(property_exists($deadline, 'name_column_4'))?$deadline->name_column_4:'cognome'}} :</h5>
        <h2 class="text-base">{{$deadline->column_4}}</h2>
      </div>


      <div class="grow">
        <h5 class="text-xs text-slate-400">
          {{isset($deadline->name_column_2)?$deadline->name_column_2:"scadenza"}}
        </h5>
        <h2 class="text-base">{{$deadline->end_time}}</h2>
      </div>
    </article>
  </a>