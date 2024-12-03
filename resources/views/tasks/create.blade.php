<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <section class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Crear Nueva Tarea</h1>

        @if ($errors->any())
            <section class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section class="bg-white shadow-md rounded px-8 py-6">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <section class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold">Título</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </section>

                <section class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold">Descripción</label>
                    <textarea id="description" name="description"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                </section>

                <section class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-bold">Categoría</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </section>

                <section class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Guardar
                    </button>
                </section>
            </form>
        </section>
    </section>
</body>
</html>
