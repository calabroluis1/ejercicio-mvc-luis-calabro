@extends('layouts.app')
@section('title', 'Lista de Cursos')
@section('content')
<a href="{{ route('courses.create') }}" class="btn">Agregar Curso</a>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Volver a Estudiantes</a>

@if($courses->count() > 0)
<table>
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($courses as $course)
<tr>
<td>{{ $course->id }}</td>
<td>{{ $course->name }}</td>
<td>
<a href="{{ route('courses.edit', $course->id) }}" class="btn">Editar</a>
<form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@else
<p>No hay cursos. <a href="{{ route('courses.create') }}">Agregar uno</a></p>
@endif
@endsection
