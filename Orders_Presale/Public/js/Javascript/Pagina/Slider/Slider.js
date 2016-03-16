//este script es para el slider de la pagina principal


var Estado = 1;
var ContSlider = 0;

var Posicion = 0;


//cada cierto tiempo esta funcion se ejetua, lo que hace es verificar, 
//si el estado es igual a 2, en este caso se refiere a que el slider no se encutra detenido
//si es igual a 2 pasa a ejecutar la funcion que hace cambiar de contenedores para el slider
setInterval(VerificarEstado, 10000);

function VerificarEstado()
{
    if (Estado == 2) {
        MostrarSlider();
    }


}




//si la <li> posee la clase seleccionado significa que se puede visualizar, si no, no se visualiza
function MostrarSlider()
{
    Estado = 2;
    var ArrayImagenes = document.getElementById('CONT_Imagenes').getElementsByTagName('li');
    var Btns = document.getElementById('SC_Btns').getElementsByTagName('li');
    for (var n = ContSlider; n <= ArrayImagenes.length; n++) {

        Btns[n].className = 'CL_Btn_Selecionado';
        ArrayImagenes[n].className = 'CL_Slider_Seleccionado';
        for (var i = 0; i < ArrayImagenes.length; i++) {
            if (i != ContSlider) {
                ArrayImagenes[i].className = 'CL_Slider_No_Seleccionado';
                Btns[i].className = 'CL_Btn_No_Seleccionado';

            }
        }
        ContSlider++;
        break;
    }
    if (ContSlider >= ArrayImagenes.length) {
        ContSlider = 0;
    }

}
//Esta funcion sirve para cuando utilice los btn de navegacion del slider, 
//recive un numero especifico y luego hace que el contenedor que se encuentre en esa posicion pase a ser visualizado
//mienstras que los demas se ocultan
function SliderPos(PosicionImg)
{
    var ArrayImagenes = document.getElementById('CONT_Imagenes').getElementsByTagName('li');
    var Btns = document.getElementById('SC_Btns').getElementsByTagName('li');
    ContSlider = PosicionImg;
    ArrayImagenes[ContSlider].className = 'CL_Slider_Seleccionado';
    Btns[ContSlider].className = 'CL_Btn_Selecionado';
    for (var i = 0; i < ArrayImagenes.length; i++) {
        if (i != ContSlider) {
            ArrayImagenes[i].className = 'CL_Slider_No_Seleccionado';
            Btns[i].className = 'CL_Btn_No_Seleccionado';

        }
    }

}


//btns para inciar y detener el slider
function DetenerSlider()
{
    var IniciarSLD = document.getElementById("CONT_Iniciar_Sld");
    var DetenerSLD = document.getElementById("CONT_Detener_Sld");
    Estado = 1;
    IniciarSLD.style.display = "block";
    DetenerSLD.style.display = "none";
}
function IniciarSlider()
{
    var IniciarSLD = document.getElementById("CONT_Iniciar_Sld");
    var DetenerSLD = document.getElementById("CONT_Detener_Sld");
    DetenerSLD.style.display = "block";
    IniciarSLD.style.display = "none";
    Estado = 2;
}



function SiguienteSlider()
{
    Posicion += 1;
    Estado = 1;
    var ArrayImagenes = document.getElementById('CONT_Imagenes').getElementsByTagName('li');

    if (Posicion <= ArrayImagenes.length && Posicion >= 0)
    {
        SliderPos(Posicion);
    }
    else
    {
        Posicion = 0;
        SliderPos(Posicion);
    }
    setInterval(Estado = 2, 5000);

}
function AtrasSlider()
{
    Posicion -= 1;
    Estado = 1;
    var ArrayImagenes = document.getElementById('CONT_Imagenes').getElementsByTagName('li');

    if (Posicion <= ArrayImagenes.length && Posicion >= 0)
    {
        SliderPos(Posicion);
    }
    else
    {
        Posicion = ArrayImagenes.length;
        SliderPos(Posicion);
    }
    setInterval(Estado = 2, 5000);

}