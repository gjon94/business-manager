<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="{{route('employee.store')}}" >
@csrf

<label for="id">ID dipendente</label>
<input type="text" name="id" id="id">

<label for="password">password</label>
<input type="password" name="password" id="password">

<button type="submit">INVIA</button>
</form>

</body>
</html>
