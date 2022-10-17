<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('business.employees.update',[$businessId,$employee->id])}}" method="post">
        @csrf 
        @method('patch')

        <label for="name">nome</label>
        <input type="text" name="name" value="{{$employee->name}}">

        <label for="surname">cognome</label>
        <input type="text" name="surname" value="{{$employee->surname}}">

        <button type="submit">modifica</button>
    </form>
</body>
</html>