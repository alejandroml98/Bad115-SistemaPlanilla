function presionar(id, profesion, tipo, origen ) { 
    origen = origen || "";
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
          document.getElementById("formulario-prueba"+origen+id).submit();          
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

function activar(usuario){
    Swal.fire({        
        title: '¿Estas seguro de Activar a este empleado?',
        text: "Esta accion es permanente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Activar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/usuario/activar/'+usuario;            
        }
    })
}

function desactivar(usuario){
    Swal.fire({        
        title: '¿Estas seguro de Desactivar a este empleado?',
        text: "Esta accion es permanente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Desactivar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {          
            window.location.href = '/usuario/desactivar/'+usuario;            
        }
    })
}


