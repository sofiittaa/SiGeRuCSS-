document.getElementById("formLogin").addEventListener("submit", async (e) => {
    e.preventDefault();

    const msg = document.getElementById("msg");
    const email = document.getElementById("email").value.trim();
    const contrasena = document.getElementById("contrasena").value.trim();

    if (email === '' || contrasena  === '') {
        msg.textContent = "Completa todos los campos"
        msg.style.color = "red"
        return;
    }


    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        msg.textContent = "El email no es válido";
        msg.style.color = "red";
        return;
    }

    try {
        const resp = await fetch("/SiGeRuCSS+/components/controlador/registroControlador/loginControlador.php", {            method: "POST",
            body: new FormData(e.target)
        });

        const data = await resp.json();

        if (data.ok) {
        msg.textContent = "Sesión iniciada correctamente ";
        msg.style.color = "green";

        setTimeout(() => {
            window.location.href = "/SiGeRuCSS+/components/controlador/listadoControlador/listarUsuControlador.php";
        }, 1500);
        } else {
            msg.textContent = data.error;
            msg.style.color = "red";
        }
    } catch (error) {
        msg.textContent = "Error de conexión";
        msg.style.color = "red";
        console.error(error);
    
    
    }
    
});
