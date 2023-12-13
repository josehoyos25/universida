<?php

// app/Http/Controllers/ProfesorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor; // Asegúrate de importar el modelo Profesor

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all(); // Obtener todos los profesores desde la base de datos

        return view('profesores.index', compact('profesores'));
    }

    public function crear()
    {
        return view('profesores.crear');
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:profesores',
            'area_especializacion' => 'required|string',
        ]);

        // Crear un nuevo profesor utilizando Eloquent
        Profesor::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'area_especializacion' => $request->input('area_especializacion'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('profesores.crear')->with('success', 'Profesor creado correctamente.');
    }
}
