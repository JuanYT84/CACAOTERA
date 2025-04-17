@extends('layouts.app')

@section('tituloPagina','Registro de Lote')

@section('content')
<br><br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">Registrar Lote</div>
        <div class="card-body">
          <!-- El atributo action permite que, si falla el AJAX, se envíe de forma tradicional -->
          <form id="registroLoteForm" method="POST" action="{{ route('register.lote') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nombre del Cultivo</label>
              <input type="text" class="form-control" name="nombre_cultivo" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Variedad</label>
              <input type="text" class="form-control" name="variedad" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Cantidad de Árboles</label>
              <input type="number" class="form-control" name="cantidad_arboles" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Área del Lote (Ha)</label>
              <input type="number" step="0.01" class="form-control" name="area_lote" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Fecha de Creación</label>
              <input type="date" class="form-control" name="fecha_creacion" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Estado</label>
              <select class="form-control" name="estado" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="sembrado">Sembrado</option>
              </select>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-success">Registrar Lote</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Interceptamos el envío del formulario para hacerlo vía AJAX.
  document.getElementById("registroLoteForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitamos la recarga de la página.

    // Convertimos los datos del formulario a un objeto.
    let formData = new FormData(this);
    let data = Object.fromEntries(formData.entries());

    // Usamos la URL correcta de la ruta, según php artisan route:list, es "/register-lote"
    fetch("{{ url('/register-lote') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
      },
      body: JSON.stringify(data)
    })
    .then(response => {
      // Para depurar, mostramos el status:
      console.log("Status:", response.status);
      return response.json();
    })
    .then(data => {
      console.log("Respuesta del servidor:", data);ñ
      if (data.success) {
        window.location.href = "{{ url('/admin/dashboard') }}";  // Redirección a admin/dashboard
      } else {
        alert("Error al registrar el lote");
      }
    })
    .catch(error => {
      console.error("Error en fetch:", error);
      alert("Hubo un error en el registro");
    });
  });
</script>
@endsection
