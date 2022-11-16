let champreqEmail= document.getElementById("champ-reqEmail")
let emailInvalid= document.getElementById("email-invalid")
let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
let submit = document.getElementById("submit")

let email = document.getElementById("email")
let firstname = document.getElementById("firstname")
let champreqFirstname = document.getElementById("champ-reqFirstname")
let nom = document.getElementById("name")
let champreqNname = document.getElementById("champ-reqName")

 


  const checkEmail = () =>{
    reset ()
    if(email.value === ""){
        champreqEmail.classList.remove("d-none")
        champreqEmail.classList.add("d-flex")
        email.style.border= "1px solid red"
        return false;
    }
    if(!regex.test(email.value.trim())){
        emailInvalid.classList.remove("d-none")
        emailInvalid.classList.add("d-flex")
        email.style.border= "1px solid red"
        
return false;
    }
   
    reset()
    return true;
  
  }
  const reset = () =>{
    champreqEmail.classList.remove("d-flex")
    champreqEmail.classList.add("d-none")
    emailInvalid.classList.remove("d-flex")
    emailInvalid.classList.add("d-none")
    email.style.border= "1px solid red"
  }
   
  /* controle prenom */
  const resetPrenom = () =>{
    champreqFirstname.classList.remove("d-flex")
    champreqFirstname.classList.add("d-none")
    firstname.style.border="1px solid  red"
  }

  const checkPrenom = () =>{
    resetPrenom()
    if(firstname.value === ""){
        champreqFirstname.classList.remove("d-none")
        champreqFirstname.classList.add("d-flex")
        password1.style.border= "1px solid red"
        return false;
    }
    resetPrenom()
    return true;
  }  
  /* controle nom */
  const resetNom = () =>{
    champreqNname.classList.remove("d-flex")
    champreqNname.classList.add("d-none")
    nom.style.border="1px solid red "
  }

  const checkNom = () =>{
    resetNom()
    if(firstname.value === ""){
        champreqNname.classList.remove("d-none")
        champreqNname.classList.add("d-flex")
        nom.style.border= "1px solid red"
        return false;
    }
    resetNom()
    return true;
  }  
  /* controle de saisie role */



  submit.addEventListener("click",(e) => {
    console.log("clicked");
  if((!checkEmail() && !checkPrenom() && !checkNom() ) || !checkEmail() || !checkPrenom()|| !checkNom() ){
    e.preventDefault()
  }

  })