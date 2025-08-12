<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;


//nueva libreria evita el duplicado al editar
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
// Mostrar lista de todos los estudiantes
public function index()
{
// El controlador solicita datos al modelo
$students = Student::getAllStudents();
// El controlador pasa los datos a la vista
return view('students.index', compact('students'));
}
// Mostrar formulario para crear nuevo estudiante
public function create()
{
return view('students.create');
}


// Mostrar formulario de edición
public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}
public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')
                     ->with('success', 'Estudiante eliminado correctamente.');
}

// Procesar actualización
public function update(Request $request, $id)
{
$validatedData = $request->validate([
    'name' => ['required', 'regex:/^[A-Za-zÀ-ÿ\s]+$/u'],
    'email' => [
        'required',
        'email',
        Rule::unique('students', 'email')->ignore($id)
    ],
    'age' => 'required|integer|min:16|max:100',
    'course' => 'required|string',
  'phone' => ['nullable','regex:/^[0-9+\s\-]{7,15}$/']
], [
    'name.regex' => 'El nombre solo puede contener letras y espacios.',
    'email.unique' => 'El correo electrónico ya está en uso.',
    'email.email'  => 'Debes ingresar un correo electrónico válido.',
]);

    $student = Student::findOrFail($id);
    $student->update($validatedData);

    return redirect()->route('students.index')
                     ->with('success', 'Estudiante actualizado correctamente');
}

// Procesar el formulario de creación
public function store(Request $request)
{
$validatedData = $request->validate([
    'name' => ['required', 'regex:/^[A-Za-zÀ-ÿ\s]+$/u'],
    'email' => 'required|email|unique:students,email',
    'age' => 'required|integer|min:16|max:100',
    'course' => 'required|string',
    
  'phone' => ['nullable','regex:/^[0-9+\s\-]{7,15}$/']
], [
    'name.regex' => 'El nombre solo puede contener letras y espacios.',
    'email.unique' => 'El correo electrónico ya está en uso.',
    'email.email'  => 'Debes ingresar un correo electrónico válido.',
]);

//dd($validatedData);
//el dd sirve para debugear y ver los datos mandados a la bd


// El controlador solicita al modelo crear el estudiante
Student::create($validatedData);
// El controlador redirige con mensaje de éxito
return redirect()->route('students.index')
->with('success', 'Estudiante creado exitosamente');
}
// Mostrar detalles de un estudiante específico
public function show($id)
{
// El controlador solicita datos específicos al modelo
$student = Student::findStudent($id);
if (!$student) {
return redirect()->route('students.index')
->with('error', 'Estudiante no encontrado');
}
// El controlador pasa los datos a la vista
return view('students.show', compact('student'));
}
}
