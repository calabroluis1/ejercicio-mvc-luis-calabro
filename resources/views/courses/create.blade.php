@extends('layouts.app')
@section('title', isset($course) ? 'Editar Curso' : 'Agregar Curso')
@section('content')
<a href="{{ route('courses.index') }}" class="btn">Volver a Cursos</a>
<form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
    @csrf
    @if(isset($course))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Nombre del Curso:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $course->name ?? '') }}" required>
        @error('name') <span style="color:red;">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn">{{ isset($course) ? 'Actualizar' : 'Guardar' }}</button>
</form>
@endsection
