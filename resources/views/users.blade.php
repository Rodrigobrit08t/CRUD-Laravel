<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>CRUD Professor</title>
</head>
<body class="antialiased bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
    <div class="relative">
        <div class="max-w-sm rounded">
            <div class="flex flex-row justify-between mt-8 ms-5">
                <header class="text-white text-2xl/8 tracking-tight">
                    CRUD Professor 
                </header>
                <a href="/add/user" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Adicionar Professor</a> 
            </div>
        
            @if (Session::has('success'))
                <p class="text-green-400 underline">{{Session::get('success')}}</p>
            @endif
            @if (Session::has('fail'))
                <p class="text-red-400 underline">{{Session::get('fail')}}</p>
            @endif 
            <div class="md:px-32 py-8 w-full flex justify-center">
                <div class="rounded border-b border-gray-200 w-full max-w-3xl">
                <table class="mx-48 min-w-full bg-white table auto">
                    <thead class="bg-gray-800 text-white">
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Telefone</th>
                        <th scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Data de Registro</th>
                        <th scope="col" cclass="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Última Atualização</th>
                        <th colspan="2" scope="col" class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                    </thead>
                    <tbody class="text-gray-700">
                        @if (count($all_users) > 0)
                            @foreach ($all_users as $item)
                            <tr class="bg-gray-100">
                                <td class="w-1/3 text-left py-3 px-4">{{$loop->iteration}}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{$item->name}}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{$item->email}}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{$item->phone}}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{$item->created_at}}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{$item->updated_at}}</td>
                                <td class="w-1/3 text-left py-3 px-4"><a href="/edit/{{$item->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</td>
                                <td class="w-1/3 text-left py-3 px-4"><a href="/delete/{{$item->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Você tem certeza?')">Deletar</td>
                            </tr>
                            @endforeach                
                        @else
                            <tr>
                                <td colspan="8">Professor Não Encontrado</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>