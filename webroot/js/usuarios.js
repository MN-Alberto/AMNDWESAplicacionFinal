window.onload = function () {
  const descripcion = document.getElementById("buscarDesc");
  const busquedaGuardada = localStorage.getItem("ultimaBusqueda");
  
  if (busquedaGuardada) {
    descripcion.value = busquedaGuardada;
    cargarUsuarios(busquedaGuardada);
  } 
  else {
    cargarUsuarios();
  }

  descripcion.addEventListener("input", function (e) {
    e.preventDefault();
    const descripcionBuscada = descripcion.value.trim();
    
    cargarUsuarios(descripcionBuscada);

    localStorage.setItem("ultimaBusqueda", descripcionBuscada);
  });
};
 
function cargarUsuarios(descripcion = "") {
    let url = "./api/wsBuscaUsuariosPorDescripcion.php";
    if (descripcion) {
        url += `?descripcion=${encodeURIComponent(descripcion)}`;
    }

    fetch(url)
        .then((response) => response.json())
        .then((listaUsuarios) => {

            const cuerpoTabla = document.querySelector(".tablaUsers tbody");
            cuerpoTabla.innerHTML = "";

            if (listaUsuarios.length > 0) {
                listaUsuarios.forEach((usuario) => {
                    const fila = document.createElement("tr");

                    fila.innerHTML = `
                        <td>${usuario.codigoUsuario}</td>
                        <td>${usuario.descripcionUsuario}</td>
                        <td>${usuario.numConexiones}</td>
                        <td>${usuario.ultimaConexion ?? ""}</td>
                        <td>${usuario.perfil}</td>
                        <td>
                            <button class="verUserBtn" data-codusuario="${usuario.codigoUsuario}">👁️</button>
                            <button class="eliminarBtn" data-codusuario="${usuario.codigoUsuario}">🗑️</button>
                        </td>
                    `;

                    cuerpoTabla.appendChild(fila);
                });

                document.querySelectorAll(".verUserBtn").forEach(boton => {
                    boton.addEventListener("click", function() {
                        const codUsuario = this.dataset.codusuario;
                        consultarUsuario(codUsuario);
                    });
                });
                
                document.querySelectorAll(".eliminarBtn").forEach(boton => {
                    boton.addEventListener("click", function() {
                        const codUsuario = this.dataset.codusuario;
                        eliminarUsuario(codUsuario);
                    });
                });

            } 
            else {
                cuerpoTabla.innerHTML = `<tr><td colspan="6">No hay usuarios con esa descripción</td></tr>`;
            }
        })
        .catch(error => console.error("Error al cargar usuarios:", error));
}

function consultarUsuario(codUsuario) {
    let url = `./api/wsConsultarUsuario.php?codUsuario=${encodeURIComponent(codUsuario)}`;

    fetch(url)
        .then(response => response.json())
        .then(usuario => {
            if (usuario.error) {
                alert(usuario.error);
                return;
            }

            const datosUsuario = `
                <h2>Consultar Usuario</h2>
                <p><strong>Usuario:</strong> ${usuario.codigo}</p>
                <p><strong>Descripción:</strong> ${usuario.descripcion}</p>
                <p><strong>Nº Conexiones:</strong> ${usuario.numConexiones}</p>
                <p><strong>Última conexión:</strong> ${usuario.ultimaConexion ?? "No conectado"}</p>
                <p><strong>Perfil:</strong> ${usuario.perfil}</p>
                <button class="botonesUsuarios" id="cerrarConsultar">Cerrar</button>
            `;

            const cuerpoTabla = document.querySelector(".tablaUsers tbody");
            cuerpoTabla.innerHTML = `
                <tr>
                    <td colspan="6">${datosUsuario}</td>
                </tr>
            `;
        
            const btnCerrar = document.getElementById("cerrarConsultar");
            if (btnCerrar) {
                btnCerrar.addEventListener("click", () => {
                    const descripcion = document.getElementById("buscarDesc").value.trim();
                    cargarUsuarios(descripcion);
                });
            }
        })
        .catch(error => console.error("Error al cargar usuario:", error));
}

function eliminarUsuario(codUsuario){
    const seguroEliminar = `
        <h2>Eliminar Usuario</h2>
        <p><strong>Seguro que desea eliminar el usuario:</strong> ${codUsuario}</p>
        <button class="botonesUsuarios" id="confirmarEliminar">Eliminar</button>
        <button class="botonesUsuarios" id="cancelarEliminar">Cancelar</button>
    `;

    const cuerpoTabla = document.querySelector(".tablaUsers tbody");
    cuerpoTabla.innerHTML = `
        <tr>
            <td colspan="6">${seguroEliminar}</td>
        </tr>
    `;

    const btnCancelar = document.getElementById("cancelarEliminar");
    btnCancelar.addEventListener("click", () => {
        const descripcion = document.getElementById("buscarDesc").value.trim();
        cargarUsuarios(descripcion);
    });

    const btnConfirmar = document.getElementById("confirmarEliminar");
    btnConfirmar.addEventListener("click", () => {
        fetch(`./api/wsEliminarUsuario.php?codUsuario=${encodeURIComponent(codUsuario)}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } 
                else {
                    alert(data.mensaje);
                    const descripcion = document.getElementById("buscarDesc").value.trim();
                    cargarUsuarios(descripcion);
                }
            })
            .catch(err => console.error("Error al eliminar usuario:", err));
    });
}