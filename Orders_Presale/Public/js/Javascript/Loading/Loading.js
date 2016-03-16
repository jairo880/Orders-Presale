var Contenedor_Loading = document.getElementById("CONT_Loadig_Allop");
window.addEventListener("load", function ()
{

    Contenedor_Loading.style.opacity = "0";
    setTimeout(RemoverContenedor, 100);
});

function RemoverContenedor()
{
    document.body.removeChild(Contenedor_Loading);
}