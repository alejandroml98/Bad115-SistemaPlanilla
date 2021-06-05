function presionar(id, profesion) { 
    event.preventDefault();
    Swal.fire({        
        title: '¿Está seguro de eliminar la profesión: "'+profesion+'" ?',
        text: "Esta accion es permanente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {          
          document.getElementById("formulario-prueba"+id).submit();          
        }
    })
}

function mostrarMensaje(mensaje) {
    Swal.fire({
        title: 'Operación exitosa',
        text: mensaje,
        icon: 'success',
        confirmButtonText: 'Entendido'
    })
}