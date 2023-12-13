<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id', 
        'curso_id', 
        'fecha_matriculacion', 
        'calificacion'];
}