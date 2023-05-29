const idProd = document.getElementById("IdProducto");
const nombre = document.getElementById("nombre");
const cbCateg = document.getElementById("cbCateg");
const marca = document.getElementById("marca");
const modelo = document.getElementById("modelo");
const color = document.getElementById("color");
const dimensiones = document.getElementById("dimensiones");
const peso_bruto = document.getElementById("peso_bruto");
const peso_neto = document.getElementById("peso_neto");
const garantia = document.getElementById("garantia");
const precio = document.getElementById("precio");
const cantidad = document.getElementById("cantidad");
const img = document.getElementById("imgProducto")

let tbProductos;

document.addEventListener("DOMContentLoaded", function () {
    tbProductos = $("#tbProductos").DataTable({
        ajax: {
            url: base_url + "productos/cargar_table_productos",
            dataSrc: "",
        },
        columns: [
            { data: "IdProducto" },
            { data: "categoria" },
            { data: "nombre" },
            { data: "marca" },
            { data: "dimensiones" },
            { data: "garantia" },
            { data: "precio" },
            { data: "cantidad" },
            { data: "estado" },
            { data: "acciones" },
        ],
    });
});

function previewImage(event, querySelector) {

    //Recuperamos el input que desencadeno la acción
    const input = event.target;

    //Recuperamos la etiqueta img donde cargaremos la imagen
    $imgPreview = document.querySelector(querySelector);

    // Verificamos si existe una imagen seleccionada
    if (!input.files.length) return

    //Recuperamos el archivo subido
    file = input.files[0];

    //Creamos la url
    objectURL = URL.createObjectURL(file);

    //Modificamos el atributo src de la etiqueta img
    $imgPreview.src = objectURL;

}

function limpiar() {
    document.getElementById("frmRegProducto").reset();
    document.getElementById("img_preview").src = base_url + "/Imagen/Productos/product-default.jpg";
}

function actualizar_estado(id, num) {
    var url = "";
    var strEstado = "";
    if (num == 0) {
        strEstado = "Desactivado";
        url = base_url + 'productos/estado_desactivar/' + id;
    } else {
        strEstado = "Activado";
        url = base_url + 'productos/estado_activar/' + id;
    }
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res == 1) {
                Swal.fire(
                    'Correcto!',
                    'Estado del Producto [' + strEstado + '] Correctamente.',
                    'success'
                )
                tbProductos.ajax.reload();
            } else {
                Swal.fire(
                    'ERROR!',
                    'Error al actualizar el estado del Producto.',
                    'error'
                )
            }
        }
    }
}

function nl2br(str, replaceMode, isXhtml) {

    var breakTag = (isXhtml) ? '<br />' : '<br>';
    var replaceStr = (replaceMode) ? '$1' + breakTag : '$1' + breakTag + '$2';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
}

function info_producto(id) {
    var strEstado = "";
    const url = base_url + "productos/info_producto/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("prod_nombre").innerHTML = "<b>" + res.nombre + "<b/>";
            document.getElementById("prod_categ").innerHTML = "<b>Categoria: <b/>" + res.categoria;
            document.getElementById("prod_marca_modelo").innerHTML = "Marca - Modelo: " + res.marca + " - " + res.modelo;
            document.getElementById("prod_peso").innerHTML = "Peso bruto:" + res.peso_bruto + " - Peso Neto:" + res.peso_neto;
            document.getElementById("prod_dimensiones").innerHTML = " Dimensiones: " + res.dimensiones;
            document.getElementById("prod_color").innerHTML = "Color: " + res.color;
            document.getElementById("prod_garantia").innerHTML = "Garantia: " + res.garantia;
            document.getElementById("prod_precio").innerHTML = "Precio: " + res.precio;
            if (res.estado == 0) {
                strEstado = 'Estado: <span class="right badge badge-success">Activo</span>';
            } else {
                strEstado = 'Estado: <span class="right badge badge-danger">Desactivado</span>';
            }
            document.getElementById("prod_estado").innerHTML = strEstado;
            document.getElementById("prod_detalles").innerHTML = nl2br(res.detalles);
            document.getElementById("prod_img").src = base_url + res.imagen;
            //$imgPreview = document.querySelector("");


            $('#modalProducto').modal('show');
        }
    }
}

function verModalEditarProducto(id) {
    const url = base_url + "productos/info_producto/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            idProd.value = res.IdProducto;
            nombre.value = res.nombre;
            cbCateg.value = res.IdCateg;
            marca.value = res.marca;
            modelo.value = res.modelo;
            color.value = res.color;
            peso_bruto.value = res.peso_bruto;
            peso_neto.value = res.peso_neto;
            dimensiones.value = res.dimensiones;
            garantia.value = res.garantia;
            precio.value = res.precio;
            cantidad.value = res.cantidad;
            detalles.value = res.detalles;
            document.getElementById("img_preview").src = base_url + res.imagen;
            $('#modalEditarProducto').modal('show');
        }
    }
}

function actualizar_producto(e){
    e.preventDefault();
    
    if (nombre.value == "" || cbCateg.value == "" || marca.value == "" || modelo.value == "" || color.value == "" || dimensiones.value == "" || peso_bruto.value == "" || peso_neto.value == "" || garantia.value == "" || precio.value == "" || cantidad.value == "") {
        Swal.fire(
            'ERROR!',
            'Verificar que todos los campos esten ingresados.',
            'error'
        )
    } else {
        const url = base_url + 'productos/ActualizarProducto/'+idProd.value;
        const frm = document.getElementById("frmActProducto");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "CORRECTO") {
                    Swal.fire(
                        'Correcto!',
                        'Producto Actualizado Correctamente.',
                        'success'
                    )
                    tbProductos.ajax.reload();
                    $('#modalEditarProducto').modal('hide');
                } else {
                    Swal.fire(
                        'ERROR!',
                        'Error al Actualizar el Producto.',
                        'error'
                    )
                }
            }
        }
    }
}

function EliminarProducto(id) {
    Swal.fire({
        title: 'Eliminar',
        text: "¿Estas seguro de Eliminar el Producto?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Elimínalo!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "productos/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == 1) {
                        Swal.fire(
                            'Correcto!',
                            'El Producto ha sido Eliminado Correctamente.',
                            'success'
                        )
                        tbProductos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function guardar_producto(e) {
    e.preventDefault();
    if (nombre.value == "" || cbCateg.value == "" || marca.value == "" || modelo.value == "" || color.value == "" || dimensiones.value == "" || peso_bruto.value == "" || peso_neto.value == "" || garantia.value == "" || precio.value == "" || cantidad.value == "" || img.value == "") {
        Swal.fire(
            'ERROR!',
            'Verificar que todos los campos esten ingresados.',
            'error'
        )
    } else {
        const url = base_url + 'productos/RegistrarProducto';
        const frm = document.getElementById("frmRegProducto");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "CORRECTO") {
                    Swal.fire(
                        'Correcto!',
                        'Producto Registrado Correctamente.',
                        'success'
                    )
                    limpiar();
                } else {
                    Swal.fire(
                        'ERROR!',
                        'Error al Registrar el Producto.',
                        'error'
                    )
                }
            }
        }
    }
}