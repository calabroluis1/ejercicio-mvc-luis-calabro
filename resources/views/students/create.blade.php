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
    <label for="course">Curso:</label>
    <select id="course" name="course" required>
        <option value="">-- Seleccione --</option>
        <option value="1° año" {{ old('course') == '1° año' ? 'selected' : '' }}>1° año</option>
        <option value="2° año" {{ old('course') == '2° año' ? 'selected' : '' }}>2° año</option>
        <option value="3° año" {{ old('course') == '3° año' ? 'selected' : '' }}>3° año</option>
        <option value="4° año" {{ old('course') == '4° año' ? 'selected' : '' }}>4° año</option>
        <option value="5° año" {{ old('course') == '5° año' ? 'selected' : '' }}>5° año</option>
    </select>
    @error('course')
    <span style="color: red; font-size: 14px;">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn">Guardar Estudiante</button>
</form>
@endsection