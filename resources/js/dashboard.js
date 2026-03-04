document.addEventListener("DOMContentLoaded", () => {
  const botonesCarrito = document.querySelectorAll(".btn-agregar-carrito");

  // Definimos la configuración del Toast (SweetAlert2)
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  });

  // Asignamos el evento click a cada botón encontrado
  botonesCarrito.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      e.preventDefault(); // Evita cualquier acción por defecto

      Toast.fire({
        icon: "success",
        title: "Producto añadido al carrito",
      });
    });
  });
});
