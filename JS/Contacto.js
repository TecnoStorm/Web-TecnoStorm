var contacto=document.getElementById('formulario-contacto')
function EnvioContacto(){
  var datosContacto = new FormData(contacto);
  var nombre=datosContacto.get('nombre-contacto')
  var apellido=datosContacto.get('apellido')
  var mail=datosContacto.get('correo-contacto')
  var pregunta=datosContacto.get('pregunta-contacto')

  $.ajax({
      url: 'http://127.0.0.1/TecnoStorm3/Web-TecnoStorm/PHP/Contacto.php',
      method: 'POST',
      data: { 'nombre': nombre, 'apellido': apellido,'mail': mail,'pregunta':pregunta},
      success: function(response) {
          alert("hola")
          $("#mensaje-contacto").html(response)
      },
      error: function() {
        alert("adios")
        alert("Error en la solicitud");
      }
    });
  }

contacto.addEventListener('submit',function(e){
  e.preventDefault();
  var datos = new FormData(contacto);
  EnvioContacto();
})

