<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante; // Asegúrate de importar el modelo Estudiante

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes desde la base de datos

        return view('estudiantes.index', compact('estudiantes'));
    }

    public function crear()
    {
        return view('estudiantes.crear');
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:estudiantes',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Crear un nuevo estudiante utilizando Eloquent
        Estudiante::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('estudiantes.crear')->with('success', 'Estudiante creado correctamente.');
    }
}
