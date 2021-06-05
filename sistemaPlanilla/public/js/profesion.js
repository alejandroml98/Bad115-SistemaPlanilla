function mostrarMensaje() {
    Swal.fire(
        'Operación exitosa',
        'Session::get("mensaje")',
        'success'
      )
}

function presionar(id) { 
    event.preventDefault();
    Swal.fire({        
        title: 'Esta seguro de eliminar esta profesion',
        text: "Esta accion es permanente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {          
          document.getElementById("formulario-prueba"+id).submit();          
        }
    })
}