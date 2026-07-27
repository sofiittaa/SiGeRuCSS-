document.getElementById("formUsuario").addEventListener("submit", async (e) => {
    e.preventDefault();

    const msg = document.getElementById("msg");
    const cedula = document.getElementById("cedula").value.trim();
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const zonaUsu = document.getElementById("zonaUsu").value.trim();
    const email = document.getElementById("email").value.trim();
    const contrasena = document.getElementById("contrasena").value.trim();


    if (cedula === '' || nombre === '' || apellido === '' || zonaUsu === '' || email === '' || contrasena === '') {
        msg.textContent = "Completa todos los campos"
        msg.style.color = "red"
        return;
    }

    if (!/^\d{8}$/.test(cedula)) {
        msg.textContent = "La cedula debe tener 8 numeros"
        msg.style.color = "red"
        return;
    }

    if (!/^[A-Za-z]{3}\d{4}$/.test(cedula)) {


        if (contrasena <= 5) {
            msg.textContent = "Contraseña debil"
            msg.style.color = "red"
            return;
        }

        try {
            const resp = await fetch("/SiGeRuCSS+/components/controlador/registroControlador/registroUsuControlador.php", ({
                method: "POST",
                body: new FormData(e.target)
            }));

            const texto = await resp.text();
            console.log(texto);
            const data = JSON.parse(texto)
    
            if (data.ok) {
                e.target.reset();
                msg.textContent = "Usuario registrado correctamente";
                msg.style.color = "green";

                setTimeout(() => {
                    window.location.href = "/SiGeRuCSS+/components/vista/ingresoVista/loginVista.html";
                }, 2000);
            } else {
                msg.textContent = data.error;
                msg.style.color = "red";
            }
        } catch (error) {
            msg.textContent = "Error de conexion";
            msg.style.color = "red";
            console.log(error);
        

        }
    }
    
});
