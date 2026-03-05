document.addEventListener("DOMContentLoaded", () => {

    const botonesCantidad = document.querySelectorAll(".btn-cantidad");

    botonesCantidad.forEach((botonCantidad) =>{
        botonCantidad.addEventListener("click", function (){
            const id = this.dataset.id;
            const accion = this.dataset.accion;

            fetch("../controller/cart/cartController.php",{
                method : "POST",
                headers : {"Content-Type": "application/x-www-form-urlencoded"},
                body : `id_producto=${id}&accion=${accion}`,
            })
            .then((res) => res.json())
            .then((data) => {
                if (data.ok) {
                    location.reload(); //recarga para reflejar el nuevo estado
                }
            });

        });
    });
});