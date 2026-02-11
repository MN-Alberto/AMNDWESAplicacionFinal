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
      
      if (listaUsuarios.length>0) {
        listaUsuarios.forEach((usuario) => {
          cuerpoTabla.innerHTML += `
            <tr>
            <td>${usuario.codigoUsuario}</td>
            <td>${usuario.descripcionUsuario}</td>
            <td>${usuario.numConexiones}</td>
            <td>${usuario.ultimaConexion ?? ""}</td>
            <td>${usuario.perfil}</td>
            <td>
                <button type="submit" name="verUser" id="botonVerUser" value="${usuario.codigoUsuario}">👁️</button>
                <button type="submit" name="eliminarU" id="botonEliminarU" value="${usuario.codigoUsuario}">🗑️</button>
            </td>
            </tr>
          `;
        });
      } 
      
      else {
        cuerpoTabla.innerHTML = `<td>No hay usuarios con esa descripción</td>`;
      }
    });  
}