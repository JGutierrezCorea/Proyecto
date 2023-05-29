const btnAddCarrito = document.querySelectorAll('.btnAgregarCarrito');
const btnCantidadCarrito = document.querySelector('#btnCantidadCarrito');
const btnVerCarrito = document.querySelector('#verCarrito');
const tablaListaCarrito = document.querySelector('#tbListaCarrito tbody');
const inputBuscar = document.querySelector('#inputModalSearch');

let listaCarrito;

document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('listaCarrito') != null) {
        listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'));
    }

    for (let i = 0; i < btnAddCarrito.length; i++) {
        btnAddCarrito[i].addEventListener('click', function () {
            let IdProducto = btnAddCarrito[i].getAttribute('prod');
            agregarCarrito(IdProducto, 1);
        })
    }
    cantidadCarrito();

    //VER MODAL DEL CARRITO
    const myModal = new bootstrap.Modal(document.getElementById('myModal'))
    btnVerCarrito.addEventListener('click', function () {
        obtenerListaCarrito()
        myModal.show();
    })

    inputBuscar.addEventListener('keyup', function (e) {
        console.log("INGRSO BSC")
        const url = base_url + 'principal/buscarProducto/' + e.target.value;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                res.forEach(product => {
                    html = `<div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="${ base_url + 'principal/detalle/' + product.IdProducto }">
                            <img src="${ product.imagen }" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    Marca: <b>${ product.marca }</b>
                                </li>
                                <li class="text-muted text-right">
                                    ${ moneda + ' ' + product.precio }
                                </li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">
                                ${ product.nombre }
                            </a>
                            <a href="${ base_url + 'principal/detalle/' + product.IdProducto }"
                                class="btn btn-outline-primary">
                                <i class="fas fa-cart-plus"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>`;
                    document.querySelector('#resultBusqueda').innerHTML = html;
                });
            }
        }
    })
});

//AGREGAR PRODUCTOS AL CARRITO...
function agregarCarrito(idProducto, cantidad) {
    if (localStorage.getItem('listaCarrito') == null) {
        listaCarrito = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem('listaCarrito'));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i]['idProducto'] == idProducto) {
                Swal.fire(
                    'Aviso!',
                    'El Producto ya esta Agregado.',
                    'warning'
                )
                return;
            }
        }
        listaCarrito.concat(localStorage.getItem('listaCarrito'));
    }
    listaCarrito.push({
        "idProducto": idProducto,
        "cantidad": cantidad,
    })

    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
    Swal.fire(
        'Aviso!',
        'Producto Agregado al Carrito de Compras.',
        'success'
    )

    cantidadCarrito();

}

function cantidadCarrito() {
    let listas = JSON.parse(localStorage.getItem('listaCarrito'));
    if (listas != null) {
        btnCantidadCarrito.textContent = listas.length;
    } else {
        btnCantidadCarrito.textContent = 0;
    }
}


//VER CARRITO

function obtenerListaCarrito() {
    const url = base_url + 'principal/listaCarrito';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.productos.forEach(producto => {
                //caracter especial ALT+96 -> APOSTROFE
                html += `<tr>
                        <td>
                        <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100">
                        </td>
                        <td>${producto.nombre}</td>
                        <td><span class="badge bg-success">${res.moneda + ' ' + producto.precio}</span></td>
                        <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                        <td>${producto.subtotal}</td>
                        <td><button class="btn btn-danger btnEliminarCarrito" type="button" prod="${producto.IdProducto}" ><i class="fas fa-times-circle"></i></button></td>
                        </tr>`;
            });
            tablaListaCarrito.innerHTML = html;
            document.querySelector('#totalGeneral').textContent = res.moneda + ' ' + res.total;
            btnEliminarProductoCarrito();
        }
    }
}

function valida(){
    Swal.fire(
        'Información!',
        'La Pagina esta en contrucción.',
        'info'
    );
}

function btnEliminarProductoCarrito() {
    let listaEliminar = document.querySelectorAll('.btnEliminarCarrito');
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener('click', function () {
            let idProducto = listaEliminar[i].getAttribute('prod');
            EliminarListaCarrito(idProducto);
        })
    }
}

function EliminarListaCarrito(idProducto) {
    for (let i = 0; i < listaCarrito.length; i++) {
        if (listaCarrito[i]['idProducto'] == idProducto) {
            listaCarrito.splice(i, 1);
        }
    }
    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
    obtenerListaCarrito();
    cantidadCarrito();
    Swal.fire(
        'Aviso!',
        'Producto Eliminado del Carrito de Compras',
        'success'
    );
}



