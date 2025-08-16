@extends('layouts.app')
@section('title', 'Lista de Estudiantes')
@section('content')
<div style="margin-bottom: 20px;">
<a href="{{ route('students.create') }}" class="btn">Agregar Nuevo Estudiante</a>
<a href="{{ route('courses.index') }}" class="btn btn-secondary mb-3">Ir a Cursos</a>

</div>
@if($students->count() > 0)
<table>
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Edad</th>
<th>Curso</th>

<th>Telefono</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($students as $student)
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->email }}</td>
<td>{{ $student->age }}</td>
<td>{{ $student->course->name ?? 'Sin curso' }}</td>
<td>{{ $student->phone }}</td>
<td>
  <div class="action-buttons">
    <a href="{{ route('students.show', $student->id) }}" class="btn btn-verdetalles">Ver Detalles</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-editar">Editar</a>
    <button type="button" class="btn btn-eliminar btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-studentid="{{ $student->id }}" data-studentname="{{ $student->name }}">
        Eliminar
    </button>
  </div>
</td>
</tr>
@endforeach
</tbody>
</table>
<!-- Modal Confirmación de Eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="deleteForm" method="POST" action="">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar al estudiante <strong id="studentName"></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botón que abrió el modal
        var studentId = button.getAttribute('data-studentid');
        var studentName = button.getAttribute('data-studentname');

        // Actualizar el texto del modal
        var modalBodyName = deleteModal.querySelector('#studentName');
        modalBodyName.textContent = studentName;

        // Cambiar la acción del formulario para enviar al route correcto
        var form = deleteModal.querySelector('#deleteForm');
        form.action = '/students/' + studentId;
    });
});
</script>

@else
<p>No hay estudiantes registrados. <a href="{{ route('students.create') }}">Agregar el primero</a></p>
@endif
@endsection