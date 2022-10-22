<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Document</title>
</head>
<body>
    <h1>Sei nella azienda! {{$business->name}}</h1>

    <h5>lista dipendenti</h5>
    
    @if(session()->has('success_mess'))
    <div class="alert alert-success">
        {{ session()->get('success_mess') }}
    </div>
@endif



   
         <!-- table employees -->
   

         <div class="overflow-x-auto relative w-1/2 m-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            nome
                        </th>

                        <th scope="col" class="py-3 px-6">
                            licenzia
                        </th>

                        <th scope="col" class="py-3 px-6">
                            modifica
                        </th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
       
                        <td class="py-4 px-6">
                           <a href="{{route('business.employees.show',[$business->id,$employee->id])}}">{{$employee->name}}</a> 
                        </td>

                        <td class="py-4 px-6">
                            <form action="{{route('business.employees.destroy',[ $business->id,$employee->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">licenzia</button>
                            </form>
                        </td>

                        <td>
                            <a href="{{route('business.employees.edit',[$business->id,$employee->id])}}"><button>modifica</button></a> 
                        </td>
                        
                    </tr>
                    @endforeach
                   
                
                </tbody>
            </table>
        </div>

        <!-- end table -->

        <a href="{{route('business.employees.create',$business->id)}}">form aGGIUNDI dipendenti</a>
    </body>
</html>