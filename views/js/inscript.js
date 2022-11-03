let champreqEmail= document.getElementById("champ-reqEmail")
let emailInvalid= document.getElementById("email-invalid")
let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
let submit = document.getElementById("submit")
let champreqPass1 = document.getElementById("champ-reqPass1")
let password1 = document.getElementById("password1")
let email = document.getElementById("email")
let firstname = document.getElementById("firstname")
let champreqFirstname = document.getElementById("champ-reqFirstname")
let name = document.getElementById("name")
let champreqNname = document.getElementById("champ-reqName")
let role = document.getElementById("role")
let champreqRole = document.getElementById("champ-reqRole")
let champreqPass2 = document.getElementById("champ-reqPass2")
let password2 = document.getElementById("password2")
let confpass = document.getElementById("confPass2")


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
    email.style.border= "1px solid black"
  }
       /* vérification mdp1 */
  const resetPass = () =>{
    champreqPass1.classList.remove("d-flex")
    champreqPass1.classList.add("d-none")
    password1.style.border="1px solid green"
  }

  const checkmdp = () =>{
    resetPass()
    if(password1.value === ""){
        champreqPass1.classList.remove("d-none")
        champreqPass1.classList.add("d-flex")
        password1.style.border= "1px solid red"
        return false;
    }
    resetPass()
    return true;
  }  
    /* verif mdp2 */
  const resetPass1 = () =>{
    champreqPass2.classList.remove("d-flex")
    champreqPass2.classList.add("d-none")
    
  }
       
  const checkmdp1 = () =>{
    resetPass1()
    if(password2.value === ""){
        champreqPass2.classList.remove("d-none")
        champreqPass2.classList.add("d-flex")
        password2.style.border= "1px solid red"
        return false;
    }
    resetPass1()
    return true;
  }  



  submit.addEventListener("click",(e) => {
    console.log("clicked");
  if((!checkEmail() && !checkmdp() && !checkmdp1() ) || !checkEmail() || !checkmdp() || !checkmdp1()){
    e.preventDefault()
  }

  })