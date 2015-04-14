window.onload = inicio;

function inicio(){
    var enlaces = document.getElementsByTagName("a");
    eventos(enlaces);
}

function eventos(enlaces){
    for (var i=0; i<enlaces.length;i++){
        var enlace = enlaces[i];       
        enlace.addEventListener("click", muestraform,false);
    }
}

function muestraform(){
    var div = document.getElementById("formulario");
    if(div.firstChild){
    div.removeChild(div.firstChild);
    }
    var form = new Formulario();
    if(this.id === "entrar"){
        form.setForm(1,"POST","login.php");
    }else{
        form.setForm(2,"POST","registro.php");
    }
    div.appendChild(form.getForm());
}


