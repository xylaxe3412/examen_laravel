<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <section class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Lista de Tareas</h1>

        <section class="flex justify-end mb-4">
            <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Crear Nueva Tarea
            </a>
        </section>

        @if(session('success'))
            <section class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </section>
        @endif

        <section class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2 text-left">Título</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Categoría</th>
                        <th class="px-4 py-2 text-center">Completado</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="bg-gray-100 border-b">
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ $task->description }}</td>
                            <td class="px-4 py-2">{{ $task->category->name }}</td>
                            <td class="px-4 py-2 text-center">
                                {{ $task->completed ? 'Sí' : 'No' }}
                            </td>
                            <td class="px-4 py-2 text-center">
                                <section class="flex justify-center space-x-2">
                                    <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Editar
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Eliminar
                                        </button>
                                    </form>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </section>
</body>
</html>
