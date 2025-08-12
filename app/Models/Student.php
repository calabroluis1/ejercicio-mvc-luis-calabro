<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
use HasFactory;
// Especificar los campos que pueden ser asignados masivamente
protected $fillable = [
'name',
'email',
'age',
'course',
'phone'
];
// Método para obtener todos los estudiantes
// Creado por: [Luis Alejandro Calabro Villalba]
// Fecha: [8-11-2025]
public static function getAllStudents()
{
return self::all();
}
// Método para buscar un estudiante por ID
// Creado por: [Luis Alejandro Calabro Villalba]
public static function findStudent($id)
{
return self::find($id);
}
// Método para validar datos de estudiante
// Creado por: [Luis Alejandro Calabro Villalba]
public function validateStudentData($data)
{
return [
'name' => $data['name'] ?? '',
'email' => $data['email'] ?? '',
'age' => $data['age'] ?? 0,
'course' => $data['course'] ?? '',
'phone' => $data['phone'] ?? 0
];
}
}
