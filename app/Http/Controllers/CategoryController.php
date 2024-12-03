<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crear la nueva categoría con los datos validados
        Category::create([
            'name' => $validated['name'],
        ]);

        // Redirigir al usuario a alguna página (por ejemplo, la lista de categorías)
        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente');
    }
}

