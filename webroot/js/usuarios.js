window.onload = function () {
  cargarUsuarios();
  const descripcion = document.getElementById("buscarDesc");
  descripcion.addEventListener("input", function (e) {
    e.preventDefault();
    cargarUsuarios(descripcion.value.trim());
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
      if (listaUsuarios!=[]) {
        listaUsuarios.forEach((usuario) => {
          cuerpoTabla.innerHTML += `
            <tr>
            <td>${usuario.codigoUsuario}</td>
            <td>${usuario.descripcionUsuario}</td>
            <td>${usuario.numConexiones}</td>
            <td>${usuario.ultimaConexion ?? ""}</td>
            <td>${usuario.perfil}</td>
            </tr>
          `;
        });
      } else {
        cuerpoTabla.innerHTML = `<td>No hay resultados que coincidan con la busqueda</td>`;
      }
    });
}