<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Asegúrate de importar el modelo Curso

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all(); // Obtener todos los cursos desde la base de datos

        return view('cursos.index', compact('cursos'));
    }

    public function crear()
    {
        $profesores = Profesor::all(); // Obtener todos los profesores para mostrar en el formulario

        return view('cursos.crear', compact('profesores'));
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_curso' => 'required|string',
            'codigo_curso' => 'required|string|unique:cursos',
            'profesor_asignado' => 'required|exists:profesores,id',
        ]);

        // Crear un nuevo curso utilizando Eloquent
        Curso::create([
            'nombre_curso' => $request->input('nombre_curso'),
            'codigo_curso' => $request->input('codigo_curso'),
            'profesor_id' => $request->input('profesor_asignado'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('cursos.crear')->with('success', 'Curso creado correctamente.');
    }
}
