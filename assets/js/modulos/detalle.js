const btnAddMasCarrito = document.querySelector('#btnAddMasCarrito');
const cantidad = document.querySelector('#product-quanity');
const IdProducto = document.querySelector('#IdProducto');

document.addEventListener('DOMContentLoaded', function() {
    btnAddMasCarrito.addEventListener('click', function(){
        agregarCarrito(IdProducto.value, cantidad.value);
    });

});

