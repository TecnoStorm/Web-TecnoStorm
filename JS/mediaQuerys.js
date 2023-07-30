const boton = document.getElementById('opcionesMedia');
const menu = document.getElementById('menu');
const cerrarMenu=document.getElementById('cerrarMenu')
boton.addEventListener('click', () => {
    menu.style.display="flex";
  });

  cerrarMenu.addEventListener('click',() =>{
    menu.style.display="none";
  })