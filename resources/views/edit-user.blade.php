<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Editar Professor</title>
</head>
<body class="ml-32  antialiased bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% min-h-screen">
    <div class="w-full max-w-xs">
        <div class="flex flex-row justify-between mt-8 ms-5">
            <header  class="text-white text-2xl/8 tracking-tight">
                Editar Professor
            <header>
        </div>
            @if(Session::has('fail'))
                <span>{{Session::get('fail')}}</span>
            @endif
                <form action="{{ route('EditUser')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="hidden" name="user_id" id="" value="{{$user->id}}">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Nome</label> 
                    <input type="text" name="name" value="{{$user->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formGroupExampleInput">
                    @error('name')
                        <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div> 
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formGroupExampleInput2">
                    @error('email')
                        <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Telefone</label>
                    <input type="number" name="phone" value="{{$user->phone}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formGroupExampleInput2">
                    @error('phone')
                        <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Salvar</button>
                </form>
    </div>
</body>
</html>