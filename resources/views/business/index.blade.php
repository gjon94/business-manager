<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Sei nella azienda! {{$business->name}}</h1>

    @foreach ($employees as $employee)
        {{$employee->name}}
    @endforeach
    <a href="{{route('business.create',$business->id)}}">form aGGIUNDI dipendenti</a>
</body>
</html>