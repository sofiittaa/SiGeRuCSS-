document.getElementById("formCamion").addEventListener("submit", async (e) => {
    e.preventDefault();

    const msg = document.getElementById("msg");
    const matricula = document.getElementById("matricula").value.trim();
    const capacidad = document.getElementById("capacidad").value.trim();

    if (matricula === '' || capacidad === '') {
        msg.textContent = "Completa todos los campos"
        msg.style.color = "red"
        return;
    }

    if (!/^[A-Za-z]{3}\d{4}$/.test(matricula)) {
        msg.textContent = "La matricula debe tener 3 letras y 4 números."
        msg.style.color = "red"
        return;
    }

    if (isNaN(capacidad) || Number(capacidad) <= 0) {
        msg.textContent = "La capacidad debe ser un numero mayo a 0"
        msg.style.color = "red"
        return;
    }

    try {
        const resp = await fetch("/SiGeRu/components/controlador/registroControlador/registrarCamControlador.php", ({
            method: "POST",
            body: new FormData(e.target)
        }));

        const texto = await resp.text();   
        console.log( texto);
        const data = JSON.parse(texto)
    
        if (data.ok) {
            e.target.reset();
            msg.textContent = "Camión registrado correctamente";
            msg.style.color = "green";

        setTimeout(() => {
            window.location.href = "/SiGeRu/components/controlador/listadoControlador/listarCamControlador.php";
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
    
});
