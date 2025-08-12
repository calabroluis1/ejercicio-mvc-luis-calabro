@extends('layouts.app')

@section('title', 'Editar Estudiante')
@php
    $courses = ['1° año', '2° año', '3° año', '4° año', '5° año'];
    $selectedCourse = old('course', $student->course);
@endphp
@section('content')
<a href="{{ route('students.index') }}" class="btn">Volver a la Lista</a>

<form action="{{ route('students.update', $student->id) }}" method="POST" style="margin-top: 20px;">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre Completo:</label>
        <input type="text" id="name" name="name"
               value="{{ old('name', $student->name) }}"
               pattern="^[A-Za-zÀ-ÿ\s]+$"
               title="Solo letras y espacios"
               required>
        @error('name')
        <span style="color: red; font-size: 14px;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email"
               value="{{ old('email', $student->email) }}" required>
        @error('email')
        <span style="color: red; font-size: 14px;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age"
               value="{{ old('age', $student->age) }}"
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
    @foreach($courses as $course)
        <option value="{{ $course }}" {{ $selectedCourse == $course ? 'selected' : '' }}>{{ $course }}</option>
    @endforeach
</select>
    @error('course')
    <span style="color: red; font-size: 14px;">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
  <label for="phone">Teléfono:</label>
  <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone ?? '') }}" placeholder="+595 9xx xxxx" />
  @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
</div>

    <button type="submit" class="btn">Actualizar Estudiante</button>
</form>
@endsection
