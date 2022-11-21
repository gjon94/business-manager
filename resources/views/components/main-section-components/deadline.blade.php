

<a href={{(isset($deadline->employeeId))?route('business.employees.index',request()->business):
route('business.page.customPage.show',[request()->business,$deadline->customPageId])}}>
    <article class="p-2 border rounded-lg shadow-md flex">
      <div class="grow">
        <h5 class="text-xs text-slate-400">Gruppo :</h5>
        <h2 class="text-base">{{(isset($deadline->employeeId))?"dipendete":$deadline->customPageName}}</h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{(property_exists($deadline, 'name_column_3'))?$deadline->name_column_3:'Nome'}} :</h5>
        <h2 class="text-base">{{(property_exists($deadline, 'name_column_3'))?$deadline->column_3:$deadline->name}}</h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">{{(property_exists($deadline, 'name_column_4'))?$deadline->name_column_4:'cognome'}} :</h5>
        <h2 class="text-base">{{(property_exists($deadline, 'name_column_4'))?$deadline->column_4:$deadline->surname}}</h2>
      </div>

      <div class="grow">
        <h5 class="text-xs text-slate-400">
          {{isset($deadline->name_column_2)?$deadline->name_column_2:"scadenza"}}
        </h5>
        <h2 class="text-base">{{$deadline->end_time}}</h2>
      </div>
    </article>
  </a>