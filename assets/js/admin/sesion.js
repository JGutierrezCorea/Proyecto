function cerrar_sesion() {
    Swal.fire({
        title: 'Salir!',
        text: "¿Desea Cerrar Sesion?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Cerrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/CerrarSesion";
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "Ok") {
                        window.location = base_url;
                    }
                }
            }

        }
    })


}