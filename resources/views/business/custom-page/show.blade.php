<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Name: {{$custom_page->name}}</h1>

    <div style="padding:2rem">
      <form action="{{route('business.page.tables.store',[$businessId,$custom_page])}}" method="post">
        @csrf
        <label for="column_1">{{$column_names->name_column_1}}</label>
        <input type="date" name="column_1">

        <label for="column_2">{{$column_names->name_column_2}}</label>
        <input type="date" name="column_2">

        <label for="column_3">{{$column_names->name_column_3}}</label>
        <input type="text" name="column_3">

        <label for="column_4">{{$column_names->name_column_4}}</label>
        <input type="text" name="column_4">

        <button type="submit">crea</button>
      </form>
    </div>

    <table>
        <thead>
          <th>{{$column_names->name_column_1}}</th>
        <th>{{$column_names->name_column_2}}</th>
        <th>{{$column_names->name_column_3}}</th>
        <th>{{$column_names->name_column_4}}</th>
          
        </thead>
        
        <tbody>
        @foreach ($custom_tables as $table)

  
    
    <form action="{{route('business.page.tables.update',[$businessId,$custom_page,$table->id])}}" method="post">
<tr >

      
      <td>@csrf
        @method('PUT')
        <input type="date" name="column_1" value="{{$table->column_1}}"></td>      
      <td><input type="date" name="column_2" value="{{$table->column_2}}"></td>      
      <td><input type="text" name="column_3" value="{{$table->column_3}}"></td>      
      <td><input type="text" name="column_4" value="{{$table->column_4}}"> <button type="submit">edit</button></td>      
     
     </tr> 
    </form>
    
  
  @endforeach
  
  
</tbody>
  
  
</table>

</body>
</html>