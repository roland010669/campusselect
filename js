let divErrors = document.querySelectorAll(".error");
for (let index = 0; index < divErrors.length; index++) {
  const div = divErrors[index];
  div.style.display = "none";
}

//sélectionner le formulaire
let formElement = document.querySelector("form");
formElement.addEventListener("submit", validateForm);
function validateForm(event) {

  event.preventDefault();

  let valide = true;
  //validation du champ "nom"
  let nomElement = document.querySelector("#nom");
  let nomElementFeedback = document.querySelector("#nomFeedback");
  let nom = nomElement.value;
 

  nom = nom.trim();
  if (nom.length < 1) {
    valide = false;
    nomElement.classList.add("invalid");
    nomElement.classList.remove("valid");
    nomElementFeedback.style.display = "block";
  } else {
    nomElement.classList.add("valid")
    nomElement.classList.remove("invalid");
    nomElementFeedback.style.display = "none";
  }
 
  //validation du champ "prenom"
 
  let prenomElement = document.querySelector("#prenom");
  let prenomElementFeedback = document.querySelector("#prenomFeedback");
  let prenom = prenomElement.value;
  
  prenom = prenom.trim();
  if (prenom.length < 1) {
    valide = false;
    prenomElement.classList.add("invalid");
    prenomElement.classList.remove("valid");
    prenomElementFeedback.style.display = "block";
  } else {
    prenomElement.classList.add("valid")
    prenomElement.classList.remove("invalid");
    prenomElementFeedback.style.display = "none";
  }
  
 
 // Validation de l'email
  let mailElement = document.querySelector("#mail");
  let mailElementFeedback = document.querySelector("#mailFeedback");
  let mail = mailElement.value.trim();
  let mailRegexp = "/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/";

  if (mail.length < 8 || !mailRegexp.test(mail) ) {
    valide = false;
    mailElement.classList.add("invalid");
    mailElement.classList.remove("valid");
    mailElementFeedback.style.display = "block";
  } else {
    mailElement.classList.add("valid")
    mailElement.classList.remove("invalid");
    mailElementFeedback.style.display = "none";
  }
    
 

 // Validation du tél

  let telElement = document.querySelector("#tel");
  let telElementFeedback = document.querySelector("#telFeedback");
  let tel = telElement.value.trim();
  
  if (tel.length !=10) {
    valide = false;
    telElement.classList.add("invalid");
    telElement.classList.remove("valid");
    telElementFeedback.style.display = "block";
  } else {
    telElement.classList.add("valid")
    telElement.classList.remove("invalid");
    telElementFeedback.style.display = "none";
  }};
