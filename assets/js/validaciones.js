document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const respuesta = document.getElementById("respuesta");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const datos = {
            nombre: form.nombre.value.trim(),
            email: form.email.value.trim(),
            asunto: form.asunto.value.trim(),
            mensaje: form.mensaje.value.trim()
        };

        try {
            const res = await fetch("api/guardar_contacto.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(datos)
            });

            const result = await res.json();
            mostrarRespuesta(res, result);

            if (res.ok) {
                form.reset();
                 // Redirige a la lista
                 window.location.href = "contacto.php";
            }
        } catch (error) {
            respuesta.textContent = "Error de conexión con el servidor.";
            respuesta.style.color = "red";
        }
    });

    function mostrarRespuesta(res, result) {
        const box = document.getElementById("respuesta");
        box.style.display = "block";
        
        if (res.ok) {
            box.className = "alert alert-success";
            box.textContent = result.message;
        } else {
            box.className = "alert alert-error";
            box.textContent = result.message + (result.errors ? " • " + result.errors.join(" | ") : "");
        }
    }
});