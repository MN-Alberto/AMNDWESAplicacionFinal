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
                            <button class="cambiarPasswordBtn" data-codusuario="${usuario.codigoUsuario}">🔐</button>
                            <button class="cambiarPerfilBtn" data-codusuario="${usuario.codigoUsuario}">🔄</button>
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
                
                document.querySelectorAll(".cambiarPasswordBtn").forEach(boton => {
                    boton.addEventListener("click", function() {
                        const codUsuario = this.dataset.codusuario;
                        cambiarPassword(codUsuario);
                    });
                });

                document.querySelectorAll(".cambiarPerfilBtn").forEach(boton => {
                    boton.addEventListener("click", function() {
                        const codUsuario = this.dataset.codusuario;
                        cambiarPerfil(codUsuario);
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

function cambiarPerfil(codUsuario){
    const nuevoPerfil = `
        <h2>Cambiar Perfil</h2>
        <p><strong>Usuario:</strong>${codUsuario}</p>
        
        <label>Nuevo perfil:</label>
        <select id="nuevoPerfilSelect">
            <option value="usuario">usuario</option>
            <option value="administrador">administrador</option>
        </select>
        <br><br>

        <button class="botonesUsuarios" id="confirmarCambiar">Aceptar</button>
        <button class="botonesUsuarios" id="cancelarCambiar">Cancelar</button>
    `;

    const cuerpoTabla = document.querySelector(".tablaUsers tbody");
    cuerpoTabla.innerHTML = `
        <tr>
            <td colspan="6">${nuevoPerfil}</td>
        </tr>
    `;

    document.getElementById("cancelarCambiar").addEventListener("click", () => {
        const descripcion = document.getElementById("buscarDesc").value.trim();
        cargarUsuarios(descripcion);
    });

    document.getElementById("confirmarCambiar").addEventListener("click", () => {

        const nuevoPerfil = document.getElementById("nuevoPerfilSelect").value;

        fetch(`./api/wsCambiarPerfilUsuario.php?codUsuario=${encodeURIComponent(codUsuario)}&perfil=${encodeURIComponent(nuevoPerfil)}`)
            .then(res => res.json())
            .then(data => {
                if(data.error){
                    alert(data.error);
                } else {
                    alert(data.mensaje);
                    const descripcion = document.getElementById("buscarDesc").value.trim();
                    cargarUsuarios(descripcion);
                }
            })
            .catch(err => console.error("Error al cambiar perfil:", err));
    });
}

function cambiarPassword(codUsuario){
    const nuevaPassword = `
        <h2>Cambiar Password</h2>
        <p><strong>Usuario:</strong>${codUsuario}</p>
            <div class="cambiarPasswordUsuario">
            <div>
            <label for="passwordAnterior">Password actual:</label>
            <input type="password" name="passwordAnterior" id="passwordAnterior" placeholder="Introduce password actual">
            </div>
    
            <div>
            <label for="nuevaPassword">Nueva password:</label>
            <input type="password" name="nuevaPassword" id="nuevaPassword" placeholder="Introduce nueva password">
            </div>

            <div>
            <label for="nuevaPasswordRepetir">Repetir nueva password:</label>
            <input type="password" name="nuevaPasswordRepetir" id="nuevaPasswordRepetir" placeholder="Introduce nueva password de nuevo">
            </div>
            </div>
        <br><br>

        <button class="botonesUsuarios" id="confirmarCambiarPassword">Aceptar</button>
        <button class="botonesUsuarios" id="cancelarCambiarPassword">Cancelar</button>
    `;

    const cuerpoTabla = document.querySelector(".tablaUsers tbody");
    cuerpoTabla.innerHTML = `
        <tr>
            <td colspan="6">${nuevaPassword}</td>
        </tr>
    `;

    document.getElementById("cancelarCambiarPassword").addEventListener("click", () => {
        const descripcion = document.getElementById("buscarDesc").value.trim();
        cargarUsuarios(descripcion);
    });

    document.getElementById("confirmarCambiarPassword").addEventListener("click", () => {

        const passwordAnterior = document.getElementById("passwordAnterior").value;
        const nuevaPassword = document.getElementById("nuevaPassword").value;
        const nuevaPasswordRepetir = document.getElementById("nuevaPasswordRepetir").value;

        fetch(`./api/wsCambiarPasswordUsuario.php?codUsuario=${encodeURIComponent(codUsuario)}&passwordAnterior=${encodeURIComponent(passwordAnterior)}&nuevaPassword=${encodeURIComponent(nuevaPassword)}&nuevaPasswordRepetir=${encodeURIComponent(nuevaPasswordRepetir)}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert(data.mensaje);
                    const descripcion = document.getElementById("buscarDesc").value.trim();
                    cargarUsuarios(descripcion);
                }
            })
            .catch(err => console.error("Error al cambiar password:", err));
    });
}