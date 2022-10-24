<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>crea azienda</h1>
    <form action="{{route('business-manage.store')}}" method="POST">
        @csrf
        <label for="name">name</label>
        <input type="text" name="name">
         <br>
        <label for="address">indirizzo</label>
        <input type="text" name="address">
         <br>
        <label for="sector">settore</label>
        <select name="sector" id="sector">
            <option value="1">edilizia</option>
            <option value="2">logistica</option>
          </select>
        <br>
        <button type="reset">Reset</button>
        <button type="submit">Crea</button>
    </form>
</body>
</html>