function presionar(id, profesion, tipo) { 
    event.preventDefault();
    Swal.fire({        
        title: '¿Está seguro de eliminar '+tipo+' "'+profesion+'" ?',
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