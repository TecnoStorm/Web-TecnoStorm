var Modal = $("#contenedorModal");
var modalRegistrar= $("#contenedor-Registrar")
var formulario=document.getElementById('formulario-Registrar')
var formularioLogin=document.getElementById('formulario-login')
$("#boton").click(TomarDato);
$("#salir").click(salir);
$("#btnregistrar").click(registrar);
$("#salirRegistrar").click(salirRegistrar)
$("#loginMedia").click(TomarDato)
formulario.addEventListener('submit',function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    Envio();
})
formularioLogin.addEventListener('submit',function(e){
  e.preventDefault();
  alert("hola");
  EnvioLogin();

})
function TomarDato() {
  Modal.addClass('show');
}
function salir(salir) {
  Modal.removeClass('show');
  
}
function registrar(registrar){
  Modal.removeClass('show')
  modalRegistrar.addClass('showRegistrar')
}
function salirRegistrar(salirRegistrar){
  modalRegistrar.removeClass('showRegistrar')
}

function Envio(){
  var datos = new FormData(formulario);
  var usu=datos.get('usuario')
  var contra=datos.get('clave')
  var confirmacion=datos.get('confirmacion-Clave')
  var mail=datos.get('correo')
  alert("hola")
  $.ajax({
      url: 'http://127.0.0.1/TecnoStorm/PHP/Registrar.php',
      method: 'POST',
      data: { 'usuario': usu, 'clave': contra,'confirmacion': confirmacion, 'mail': mail},
      success: function(response) {
          $("#mensaje").html(response)
      },
      error: function() {
        alert("Error en la solicitud");
      }
    });
  }
  function EnvioLogin(){
    var datosLogin=new FormData(formularioLogin);
    var usuario=datosLogin.get('usuario');
    var clave=datosLogin.get('clave');
    $.ajax({
     url: 'http://127.0.0.1/TecnoStorm/PHP/Login.php',
     method: 'POST',
     data: { 'usuario': usuario, 'clave': clave},
     success: function(response) {
      alert("hola")   
      $("#mensaje-login").html(response)
     },
     error: function() {
       alert("Error en la solicitud");
     }
   });
   }
