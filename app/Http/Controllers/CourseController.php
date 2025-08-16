<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÿ0-9\s]+$/u', 'unique:courses,name'],
            'description' => 'nullable|string'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.regex' => 'El nombre solo puede contener letras, números y espacios.',
            'name.unique' => 'Este curso ya existe.'
        ]);

        Course::create($validatedData);

        return redirect()->route('courses.index')
                         ->with('success', 'Curso creado correctamente');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => [
                'required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÿ0-9\s]+$/u',
                Rule::unique('courses', 'name')->ignore($id)
            ],
            'description' => 'nullable|string'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.regex' => 'El nombre solo puede contener letras, números y espacios.',
            'name.unique' => 'Este curso ya existe.'
        ]);

        $course = Course::findOrFail($id);
        $course->update($validatedData);

        return redirect()->route('courses.index')
                         ->with('success', 'Curso actualizado correctamente');
    }

public function destroy($id)
{
    $course = Course::findOrFail($id);

    // Verificar si hay estudiantes asignados
    if ($course->students()->count() > 0) {
        return redirect()->route('courses.index')
                         ->with('error', 'No se puede eliminar el curso porque tiene estudiantes asignados.');
    }

    $course->delete();

    return redirect()->route('courses.index')
                     ->with('success', 'Curso eliminado correctamente');
}

}
