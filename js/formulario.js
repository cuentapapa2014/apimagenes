
function Formulario() {
    //this.form = document.createElement("form");
    this.form = "";
}

Formulario.prototype.setForm = function(tipo, metodo, accion){
    this.form = document.createElement("form");
    this.form.setAttribute("id","form");
    this.form.setAttribute("method",metodo);
    this.form.setAttribute("action",accion);
    var login = document.createElement("input");
    var password = document.createElement("input");
    var boton = document.createElement("input");
    login.setAttribute("type","text");
    login.setAttribute("name","login");
    login.setAttribute("placeholder","login");
    password.setAttribute("type","password");
    password.setAttribute("name","password");
    password.setAttribute("placeholder","password");
    boton.setAttribute("type","submit");
    boton.setAttribute("value","Entrar");
    this.form.appendChild(login);
    this.form.appendChild(password);
    if(tipo===2){
        var confirmaPass = document.createElement("input");
        confirmaPass.setAttribute("type","password");
        confirmaPass.setAttribute("name","rpassword");
        confirmaPass.setAttribute("placeholder","Repite password");
        boton.setAttribute("value","Registrarme");
        this.form.appendChild(confirmaPass);
    }
    this.form.appendChild(boton);
    var inputs = this.form.getElementsByTagName("input");
    for(var i=0; i<inputs.length;i++){
        inputs[i].setAttribute("class","bloque");
    }
};

Formulario.prototype.getForm = function(){
    return this.form;
};




