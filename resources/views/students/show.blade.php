@extends('layouts.app')
@section('title', 'Detalles del Estudiante')
@section('content')
<a href="{{ route('students.index') }}" class="btn">Volver a la Lista</a>
<div style="margin-top: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
<h2>Información del Estudiante</h2>
<p><strong>ID:</strong> {{ $student->id }}</p>
<p><strong>Nombre:</strong> {{ $student->name }}</p>
<p><strong>Email:</strong> {{ $student->email }}</p>
<p><strong>Edad:</strong> {{ $student->age }} años</p>
<p><strong>Curso:</strong> {{ $student->course }}</p>
<p><strong>Telefono:</strong> {{ $student->phone }}</p>
<p><strong>Fecha de registro:</strong> {{ $student->created_at->format('d/m/Y H:i') }}</p>
@if($student->updated_at != $student->created_at)
<p><strong>Última actualización:</strong> {{ $student->updated_at->format('d/m/Y H:i') }}</p>
@endif
</div>
@endsection
