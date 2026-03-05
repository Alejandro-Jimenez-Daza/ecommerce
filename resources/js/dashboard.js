document.addEventListener("DOMContentLoaded", () => {

    const botonesCarrito = document.querySelectorAll(".btn-agregar-carrito");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        },
    });

    botonesCarrito.forEach((boton) => {
        boton.addEventListener("click", function () {   // ❌ tenías dos .addEventListener anidados — solo necesitas uno
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;

            fetch("../controller/cart/cartController.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_producto=${id}`,
            })
            .then((res) => res.json())                  // ❌ tenías un punto y coma aquí cortando la cadena
            .then((data) => {                           // ❌ faltaban paréntesis en (data)
                if (data.ok) {
                    Toast.fire({ icon: "success", title: `${nombre} - agregado al carrito` });
                }
            });                                         // ❌ tenías })/; — slash y paréntesis de más
        });
    });
});