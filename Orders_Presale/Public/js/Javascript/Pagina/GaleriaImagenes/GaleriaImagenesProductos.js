//este scrip lo que hace es que en la pagina se encuentra una <ul> con varias <li>, estas <li> poseen varias rutas de 
//imagenes, deacuerdo a un numero ingresado al llamar la funcion visualizo la imagen deseada
//estas <li> se guardan en un array 
var Contenedor = document.getElementById('SliderImagenesDesplegables');
var ContImagenes = document.getElementById('SliderImagenes').getElementsByTagName('li');//Array que contiene las <li>
var Body = document.getElementById("BodyHeader");


function VerImagen(PosicionImg)
{
    var PosImg = PosicionImg;
    PosicionActual = PosImg;
    Contenedor.style.marginLeft = "0px";
    ContImagenes[PosImg].style.display = "block";

    Body.style.overflow = "hidden";
    //esta sesion es para el contenedor invisible con el cual se puede cerrar el contenedor al darle click
    InsertarConInvisible(2, 2);

}

function CerrarSliderImg()
{

    Contenedor.style.marginLeft = "-1800px";
    for (var i = 0; i <= ContImagenes.length; i++) {
        ContImagenes[i].style.display = "none";
        Body.style.overflow = "auto";
        //esta sesion es para el contenedor invisible con el cual se puede cerrar el contenedor al darle click
        BorrarContInvisble();

    }
}
