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
    
    <div class="flex justify-center">
        <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
            <div class="py-3 px-6 border-b border-gray-300">
                Featured
            </div>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2">{{$employee->name}}</h5>
                <p class="text-gray-700 text-base mb-4">
                    With supporting text below as a natural lead-in to additional content.
                </p>
                <form action="{{route('business.employees.destroy',[ $business->id,$employee->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-medium text-xs leading-tight uppercase rounded shadow-md
                 hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg 
                 transition duration-150 ease-in-out">licenzia</button>
                </form>
                
            </div>
            <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                2 days ago
            </div>
        </div>
    </div>

</body>
</html>