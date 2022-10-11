<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    form creazione dipendente
    <form action="{{route('business.store',$business)}}" method="POST">
        @csrf
        <label for="name">nome</label>
        <input type="text" name="name">
        <br>
        <label for="surname">sopranome</label>
        <input type="text" name="surname">
        <br>
        <label for="role">ruolo</label>
        <select name="role">
            <option selected value="10">dipendente</option>
            <option value="5">segretario</option>
        </select>
        <br>
        <label for="dateOfBirth">data di nascita</label>
        <input type="date" name="dateOfBirth">
        <br>
        <button type="reset">cancella</button>
        <button type="submit">crea dipendente</button>
    </form>
</body>
</html>