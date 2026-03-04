document.addEventListener("DOMContentLoaded", () => {
  const botonesEliminar = document.querySelectorAll(".btn-eliminar-usuario");

  // Agregamos paréntesis a (boton) =>
  botonesEliminar.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      e.preventDefault(); // Detengo el envío del formulario

      // Busco el formulario más cercano a este botón
      const formulario = this.closest(".form-eliminar");

      // Disparo la alerta de confirmación con tu configuración original
      Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "Una vez lo hagas no podra revertirse!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e49a2b",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Borrarlo!",
      }).then((result) => {
        // Si el usuario confirma
        if (result.isConfirmed) {
          // Primero enviamos el formulario
          formulario.submit();

          /* Nota: Al hacer submit(), la página se recargará. 
                       La alerta de "Deleted!" que pusiste aquí normalmente no se alcanza a ver 
                       porque el navegador salta a la página del controlador PHP.
                    */
        }
      }); // Aquí cerramos el .then
    }); // Aquí cerramos el addEventListener
  }); // Aquí cerramos el forEach
}); // Aquí cerramos el DOMContentLoaded
