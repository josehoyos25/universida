<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula; // Asegúrate de importar el modelo Matricula
use App\Models\Estudiante; // Asegúrate de importar el modelo Estudiante
use App\Models\Curso; // Asegúrate de importar el modelo Curso

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::all(); // Obtener todas las matrículas desde la base de datos

        return view('matriculas.index', compact('matriculas'));
    }

    public function crear()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes para mostrar en el formulario
        $cursos = Curso::all(); // Obtener todos los cursos para mostrar en el formulario

        return view('matriculas.crear', compact('estudiantes', 'cursos'));
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_matriculacion' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        // Crear una nueva matrícula utilizando Eloquent
        Matricula::create([
            'estudiante_id' => $request->input('estudiante_id'),
            'curso_id' => $request->input('curso_id'),
            'fecha_matriculacion' => $request->input('fecha_matriculacion'),
            'calificacion' => $request->input('calificacion'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('matriculas.crear')->with('success', 'Matrícula creada correctamente.');
    }
}