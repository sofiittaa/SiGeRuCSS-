document.getElementById("formCont").addEventListener("submit", async (e) => {
    e.preventDefault();

    const msg = document.getElementById("msg");
    const capacidad = document.getElementById("capacidad").value.trim();
    const zona = document.getElementById("zona").value.trim();

    if ( capacidad === '' || zona === '') {
        msg.textContent = "Completa todos los campos"
        msg.style.color = "red"
        return;
    }
    
    if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(zona)) {
        msg.textContent = "Debes ingresar letras en la zona del contenedor"
        msg.style.color = "red"
        return;
    }


    if (isNaN(capacidad) || Number(capacidad) <= 0) {
        msg.textContent = "La capacidad debe ser un numero mayo a 0"
        msg.style.color = "red"
        return;
    }

    try {
        const resp = await fetch("/SiGeRu/components/controlador/registroControlador/registrarContControlador.php", ({
            method: "POST",
            body: new FormData(e.target)
        }));

        const texto = await resp.text();   
        console.log( texto);
        const data = JSON.parse(texto)
    
        if (data.ok) {
            e.target.reset();
            msg.textContent = "Contenedor registrado correctamente";
            msg.style.color = "green";

        setTimeout(() => {
            window.location.href = "/SiGeRu/components/controlador/listadoControlador/listarContControlador.php";
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


