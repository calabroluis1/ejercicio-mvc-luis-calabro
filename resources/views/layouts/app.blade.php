<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Sistema de Gestión de Estudiantes</title>
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
padding: 20px;
background-color: #f4f4f4;
}
.container {
max-width: 800px;
margin: 0 auto;
background-color: white;
padding: 20px;
border-radius: 8px;
box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.header {
background-color: #3498db;
color: white;
padding: 15px;
margin: -20px -20px 20px -20px;
border-radius: 8px 8px 0 0;
}
.btn {
display: inline-block;
padding: 10px 15px;
background-color: #3498db;
color: white;
text-decoration: none;
border-radius: 4px;
margin: 5px;
}
.btn:hover {
background-color: #2980b9;
}
.alert {
padding: 10px;
margin: 10px 0;
border-radius: 4px;
}
.alert-success {
background-color: #d4edda;
color: #155724;
border: 1px solid #c3e6cb;
}
.alert-error {
background-color: #f8d7da;
color: #721c24;
border: 1px solid #f5c6cb;
}
table {
width: 100%;
border-collapse: collapse;
margin: 20px 0;
}
th, td {
padding: 12px;
text-align: left;
border-bottom: 1px solid #ddd;
}
th {
background-color: #f8f9fa;
}
.form-group {
margin: 15px 0;
}
label {
display: block;
margin-bottom: 5px;
font-weight: bold;
}
input[type="text"], input[type="email"], input[type="number"] {
width: 100%;
padding: 8px;
border: 1px solid #ddd;
border-radius: 4px;
box-sizing: border-box;
}
/* Contenedor para botones en la tabla */
.action-buttons {
  display: flex;
  gap: 8px; /* espacio entre botones */
  flex-wrap: wrap; /* que se ajusten si falta espacio */
  align-items: center;
}

/* Botones con colores específicos */
.btn-verdetalles {
  background-color: #28a745; /* verde */
  color: white;
}

.btn-verdetalles:hover {
  background-color: #218838;
}

.btn-editar {
  background-color: #007bff; /* azul */
  color: white;
}

.btn-editar:hover {
  background-color: #0069d9;
}

.btn-eliminar {
  background-color: #dc3545; /* rojo */
  color: white;
}

.btn-eliminar:hover {
  background-color: #c82333;
}

/* Opcional: hacer que los botones no se expandan mucho */
.action-buttons .btn {
  padding: 6px 12px;
  font-size: 0.9rem;
  border-radius: 4px;
  text-align: center;
  white-space: nowrap;
}
select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: inherit;
  font-size: 1rem;
  color: #333;
  background-color: white;
  appearance: none; /* para quitar flecha nativa en algunos navegadores */
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D'10'%20height%3D'7'%20viewBox%3D'0%200%2010%207'%20xmlns%3D'http://www.w3.org/2000/svg'%3E%3Cpath%20d%3D'M0%200l5%207%205-7z'%20fill%3D'%23333'%20/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 10px 7px;
}

</style>
</head>
<body>
<div class="container">
<div class="header">
<h1>@yield('title', 'Sistema de Gestión de Estudiantes')</h1>
</div>
@if(session('success'))
<div class="alert alert-success">
   <!-- Paso 3: Vista para listar estudiantes Crear resources/views/students/index.blade.php :-->
{{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-error">
{{ session('error') }}
</div>
@endif
@yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>