
const inputPrecio = document.getElementById('precio');

inputPrecio.addEventListener('input', function () {
    // quitar todo lo que no sea número
    let valor = this.value.replace(/\D/g, '');
    // formatear con puntos de miles
    if (valor !== '') {
        valor = parseInt(valor).toLocaleString('es-CO');
    }
    this.value = valor;
});
