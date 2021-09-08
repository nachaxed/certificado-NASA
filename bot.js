const nombre = document.getElementById("name")
const apellido = document.getElementById("lastname")
const email = document.getElementById("email")
const form  = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", (e)=>{
    e.preventDefault()
    let warnings = ""
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = ""
    if(nombre.ariaValueMax <6){
        warnings += `El nombre no es valido <br>` 
        }
        // console.log("mail correcto")
        if (!regexEmail.exec(email)) {
            alert("La direccion de email es correcta." );
        } 
})