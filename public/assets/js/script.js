
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
    let genre = document.querySelector('input[name="gender"]:checked');
    let lieu_habitation = document.getElementsByName("lieu_habitation")[0].value;
    let telephone = document.getElementsByName("telephone")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let erreurNom = document.querySelector("#erreurNom");
    let erreurGenre = document.querySelector("#erreurGenre");
    let erreurPrenoms = document.querySelector("#erreurPrenoms");
    let erreurEmail = document.querySelector("#erreurEmail");
    let erreurTelephone = document.querySelector("#erreurTelephone");
    let erreurHabitation = document.querySelector("#erreurHabitation");
    if(nom==""){
        erreurNom.textContent = "Ce champ est requis";
        return false;
    }else if(prenoms==""){
        erreurPrenoms.textContent = "Ce champ est requis";
        return false;
    }else if(email==""){
        erreurEmail.textContent = "Ce champ est requis";
        return false;
    }else if(telephone==""){
        erreurTelephone.textContent = "Ce champ est requis et au format 10 chiffres";
        return false;
    }else if(!validatePhone(telephone)){
        erreurTelephone.textContent = "Ce numéro de téléphone n'est pas valide";
        return false;
    }
    else if(lieu_habitation==""){
        erreurHabitation.textContent = "Ce champ est requis";
        return false;
    }
    else if(!validateEmail(email)){
        erreurEmail.textContent = "Cette adresse n est pas valide";
        return false;
    }
    else if(!genre){
        erreurGenre.textContent = "Ce champ est requis";
        return false;
    }
    console.log(gender);
}
function validerPresence(){
    let email = document.getElementsByName("email")[0].value;
    let erreurEmail = document.querySelector("#erreurEmail");
    if(email==""){
        erreurEmail.textContent = "Ce champ est requis";
        return false;
    }
    else if(!validateEmail(email)){
        erreurEmail.textContent = "Cette adresse email n est pas valide";
        return false;
    }
}
function validatePhone(phone){
    let regexPhone = /^\d{10}$/;
    return phone.match(regexPhone);
}