<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>le tue aziende</h1>
    @foreach ($businessList as $item)
        
    <a href="{{route('business.index',["businessId"=>$item->id])}}">{{$item->name}}</a>
            
    @endforeach

    <a href="{{route('business-manage.create')}}"><h3>Crea la tua azienda</h3></a>

</body>
</html>