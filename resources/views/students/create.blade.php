@extends('layouts.app')
@section('title', 'Agregar Nuevo Estudiante')
@section('content')
<a href="{{ route('students.index') }}" class="btn">Volver a la Lista</a>
<form action="{{ route('students.store') }}" method="POST" style="margin-top: 20px;">
@csrf
<div class="form-group">
<label for="name">Nombre Completo:</label>
<input type="text" id="name" name="name"
       value="{{ old('name') }}"
       pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$"
       title="Solo letras y espacios"
       required>
@error('name')
<span style="color: red; font-size: 14px;">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="email">Correo Electrónico:</label>
<input type="email" id="email" name="email" value="{{ old('email') }}" required>
@error('email')
<span style="color: red; font-size: 14px;">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="age">Edad:</label>
<input type="number" id="age" name="age"
       value="{{ old('age') }}"
       min="16" max="100"
       title="Edad entre 16 y 100 años"
       required>
@error('age')
<span style="color: red; font-size: 14px;">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
    <label for="course_id">Curso:</label>
    <select id="course_id" name="course_id" required>
        <option value="">-- Seleccione --</option>
        @foreach(App\Models\Course::all() as $course)
            <option value="{{ $course->id }}" {{ old('course_id', $student->course_id ?? '') == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    @error('course_id')
        <span style="color:red;">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
  <label for="phone">Teléfono:</label>
  <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone ?? '') }}" placeholder="+595 9xx xxxx" />
  @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<button type="submit" class="btn">Guardar Estudiante</button>
</form>
@endsection