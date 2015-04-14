window.onload = inicio;

function inicio(){
    var btNuevo = document.getElementById("btsubir");
    var btBorrar = document.getElementById("btborrar");
    var btCarpeta = document.getElementById("btcarpeta");
    btNuevo.addEventListener("click",visible,false);
    btBorrar.addEventListener("click",visible,false);
    btCarpeta.addEventListener("click",carpeta,false);
}

function visible(){
    var subir = document.getElementById("subir");
    var eliminar = document.getElementById("eliminar");
    if(this.id==="btsubir"){
        subir.removeAttribute("class");
    }else{
        var enlace = document.createElement("a");
        enlace.setAttribute("href","edicion.php");
        enlace.click();
    }
}

function carpeta(){
    var division = document.getElementById("subida");
    var select = document.getElementById("selectcarpeta");
    var input = document.createElement("input");
    input.setAttribute("type","text");
    input.setAttribute("name","destino");
    input.setAttribute("id","selectcarpeta");
    input.setAttribute("placeholder","Nombre de carpeta");
    select.parentNode.insertBefore(input, select.nextSibling);
    select.parentNode.removeChild(select);
    
}


