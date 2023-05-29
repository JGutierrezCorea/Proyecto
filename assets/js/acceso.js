

function User_Acesso_Login(e) {
    e.preventDefault();
    const correo = document.getElementById("correo");
    const clave = document.getElementById("clave");

    if (correo.value != "jesus_15_4_93@hotmail.com") {
        Swal.fire(
            'Información!',
            'Pagina en construcción.',
            'info'
        )
    } else {
        if (correo.value == "" || clave.value == "") {
            Swal.fire(
                'ERROR!',
                'Ingresar las Credenciales Necesarias para el Acceso.',
                'error'
            )
        } else {
            const url = base_url + 'usuarios/validar_usuario';
            const frm = document.getElementById("frmAcceso");
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(new FormData(frm));
            //http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);

                    if (res == "ADMIN") {
                        Swal.fire({
                            title: res,
                            text: "Bienvenido a RMV VILLAR!",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = base_url + "usuarios/admin";
                            }
                        })
                    } else {
                        Swal.fire(
                            'ERROR!',
                            'Usuario y/o Clave incorrecto.',
                            'error'
                        )
                    }
                }
            }
        }
    }


}