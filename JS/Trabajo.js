var curriculum = document.getElementById('formulario-cv');
function EnvioTrabajo() {
    var datosTrabajo = new FormData(curriculum);
    fetch('http://127.0.0.1/TecnoStorm3/Web-TecnoStorm/PHP/Subir.php', {
      method: 'POST',
      body: datosTrabajo,
    })
    .then(response => response.text())
    .then(data => {
      alert("hola");
      $("#mensaje-enviado").html(data);
    })
    .catch(error => {
      alert("adios");
      console.error('Error en la solicitud:');
    });
  }
  

curriculum.addEventListener('submit',function(e){
 e.preventDefault();
})

