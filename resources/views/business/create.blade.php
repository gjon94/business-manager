<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Utente {{auth()->user()->name}}</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    form creazione dipendente
    <form action="{{route('business.employees.store',$business)}}" method="POST">
        @csrf
        <label for="name">nome</label>
        <input type="text" name="name">
        <br>
        <label for="surname">sopranome</label>
        <input type="text" name="surname">
        <br>
        <label for="role">ruolo</label>
        <select name="role">
            <option value="1">1 admin</option>
            <option value="2">2 manager</option>
            <option value="3">3 senior secretary</option>
            <option value="4">4 secretary</option>
            <option value="10">10 dipendente</option>
        </select>
        <br>
        <label for="contract">tipo di contratto</label>
        <select name="contract_type_id">
            <option selected value="1">indeterminato</option>
            <option  value="2">partime</option>
        </select>
        <br>
        
        <br>
        <label for="start_time">inziio contratto</label>
        <input type="date" name="start_time">
        <br>
        <label for="end_time">fine contratto</label>
        <input type="date" name="end_time">
        <br>
        paga oraria:
        <input type="number" name="hourly_pay" value="10">

        <br>
        valuta:
        <input type="text" name="currency" value="euro">

        <br>
        <label for="dateOfBirth">data di nascita</label>
        <input type="date" name="dateOfBirth">
        <br>
        <button type="reset">cancella</button>
        <button type="submit">crea dipendente</button>
    </form>
</body>
</html>