<h1>inddex</h1>
<a href="{{route('business.page.custom-page.create',$businessId)}}">Crea nuova pagina</a>

@foreach ($custom_pages as $page)
   <a href="{{route('business.page.custom-page.show',[$businessId, $page->id])}}"><h2>{{$page->name}}</h2></a> 
@endforeach