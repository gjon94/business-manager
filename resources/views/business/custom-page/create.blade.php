<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('business.page.custom-page.store',$businessId)}}" method="post">
        @csrf 
        <label for="name"></label>
        <input type="text" name="name" placeholder="Inserisci nome nuova pagina">
        <br>
        <label for="description"></label>
        <input type="text" name="description" placeholder="descrizione..">
        <br>
        <button type="submit">crea</button>
    </form>


</body>
</html>