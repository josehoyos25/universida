@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded shadow">
        <h1 class="text-3xl font-semibold mb-4">Estudiantes</h1>

        <!-- Formulario para agregar estudiantes -->
        <form action="{{ route('estudiantes.guardar') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-input rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-input rounded-md shadow-sm">
            </div>

            <div>
                <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Guardar Estudiante</button>
            </div>
        </form>
    </div>
@endsection
