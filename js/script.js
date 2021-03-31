
function validerLogin(){
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    let erreurmotdepasse = document.querySelector("#erreurmotdepasse");
    let erreuremail = document.querySelector("#error");
    if(email==""){
        erreuremail.textContent = "Ce champ est requis";
        return false;
    }
    else if(!validateEmail(email)){
        erreuremail.textContent = "Cette adresse email n est pas valide";
        return false;
    }else if(password == ""){
        erreurmotdepasse.textContent = "Ce champ est requis";
        return false;
    }else if(password.length < 8){
        erreurmotdepasse.textContent = "Au minimum 8 caractères";
        return false;
    }
}
function validateEmail(email){
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}
function validateAddForm(){
   let statut = document.getElementsByName("statut")[0].value;
   if(statut==""){
       let error = document.querySelector("#error");
       error.textContent = "ce champ est requis";
       return false;
   }else if(statut !== "Oui"){
        let error = document.querySelector("#error");
        error.textContent = "Ce champ doit contenir uniquement Oui";
        return false;
   }
}
function validerInscription(){
    //déclaration des variables
    let nom = document.getElementsByName("nom")[0].value;
    let prenoms = document.getElementsByName("prenoms")[0].value;
    let password = document.getElementsByName("password")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let erreurNom = document.querySelector("#erreurNom");
    let erreurPrenoms = document.querySelector("#erreurPrenoms");
    let erreurEmail = document.querySelector("#erreurEmail");
    let erreurPassword = document.querySelector("#erreurPassword");
    if(nom==""){
        erreurNom.textContent = "Ce champ est requis";
        return false;
    }else if(nom.length < 3){
        erreurNom.textContent = "Au minimum 3 caractères sont requis";
        return false;
    }else if(prenoms==""){
        erreurPrenoms.textContent = "Ce champ est requis";
        return false;
    }else if(prenoms.length < 3){
        erreurPrenoms.textContent = "Au minimum 3 caractères sont requis";
        return false;
    }
    else if(email==""){
        erreurEmail.textContent = "Ce champ est requis";
        return false;
    }
    else if(!validateEmail(email)){
        erreurEmail.textContent = "Cette adresse email n est pas valide";
        return false;
    }else if(password==""){
        erreurPassword.textContent = "Ce champ est requis";
        return false;
    }else if(password.length < 8){
        erreurPassword.textContent = "Au minimum 8 caractères sont requis";
        return false;
    }
}