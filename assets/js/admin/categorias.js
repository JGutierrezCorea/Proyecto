let tbCategorias;

const idCateg = document.getElementById("IdCateg");
const nombre = document.getElementById("nombre");
const img = document.getElementById("imgCateg");

document.addEventListener("DOMContentLoaded", function () {
  tbCategorias = $("#tbCategorias").DataTable({  
    ajax: {
          destroy:true,
          processesing: true,
          url: base_url + "categorias/cargar_table_categorias",
          dataSrc: "",
      },
      columns: [
        { data: "IdCateg" },
        { data: "nombre" },
        { data: "f_reg" },
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
  if (!input.files.length) return;

  //Recuperamos el archivo subido
  file = input.files[0];

  //Creamos la url
  objectURL = URL.createObjectURL(file);

  //Modificamos el atributo src de la etiqueta img
  $imgPreview.src = objectURL;
}

function limpiar() {
  document.getElementById("frmRegCategoria").reset();
  document.getElementById("img_preview").src =
    base_url + "/Imagen/Categorias/categoria-default.jpg";
}

function guardar_categoria(e) {
  e.preventDefault();
  if (nombre.value == "" || img.value == "") {
    Swal.fire(
      "ERROR!",
      "Verificar que todos los campos esten ingresados.",
      "error"
    );
  } else {
    const url = base_url + "categorias/RegistrarCategoria";
    const frm = document.getElementById("frmRegCategoria");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res == "CORRECTO") {
          Swal.fire(
            "Correcto!",
            "Categoria Registrado Correctamente.",
            "success"
          );
          limpiar();
        } else {
          Swal.fire("ERROR!", "Error al Registrar la Categoria.", "error");
        }
      }
    };
  }
}

function actualizar_categoria(e){
  e.preventDefault();
  
  if (nombre.value == "" ) {
      Swal.fire(
          'ERROR!',
          'Verificar que todos los campos esten ingresados correctamente.',
          'error'
      )
  } else {
      const url = base_url + 'categorias/ActualizarCategoria/' + idCateg.value;
      const frm = document.getElementById("frmActCategoria");
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
                      'Categoria Actualizada Correctamente.',
                      'success'
                  )
                  tbCategorias.ajax.reload();
                  $('#modalEditarCategoria').modal('hide');
              } else {
                  Swal.fire(
                      'ERROR!',
                      'Error al Actualizar la Categoria.',
                      'error'
                  )
              }
          }
      }
  }
}

function verModalEditarCateg(id) {
  const url = base_url + "categorias/info_categoria/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          idCateg.value = res.IdCateg;
          nombre.value = res.nombre;
          document.getElementById("img_preview").src = base_url + res.imagen;
          $('#modalEditarCategoria').modal('show');
      }
  }
}

function actualizar_estado(id, num) {
  var url = "";
  var strEstado = "";
  if (num == 0) {
      strEstado = "Desactivado";
      url = base_url + 'categorias/estado_desactivar/' + id;
  } else {
      strEstado = "Activado";
      url = base_url + 'categorias/estado_activar/' + id;
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
                  'Estado de la Categoria [' + strEstado + '] Correctamente.',
                  'success'
              )
              tbCategorias.ajax.reload();
          } else {
              Swal.fire(
                  'ERROR!',
                  'Error al actualizar el estado de la Categoria.',
                  'error'
              )
          }
      }
  }
}

function Eliminar(id) {
  Swal.fire({
      title: 'Eliminar',
      text: "¿Estas seguro de Eliminar la Categoria?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Elimínalo!'
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "categorias/eliminar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if (res == 1) {
                      Swal.fire(
                          'Correcto!',
                          'La Categoria ha sido Eliminada Correctamente.',
                          'success'
                      )
                      tbCategorias.ajax.reload();
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
