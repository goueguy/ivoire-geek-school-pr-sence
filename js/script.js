
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