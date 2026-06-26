const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const btnsubmit = document.getElementById("btnsubmit");

//desactiver le bouton par defaut 
if(btnsubmit) {
    btnsubmit.disabled = true;
}

//permet d'afficher ou masquer les message d'erreur
function showError(input, message)
{
    const baliseP = input.nextElementSibling;
    if (baliseP) {
        if (message ){
            baliseP.textContent = message;
            input.classList.add("is-invalid");
        }
        else {
            baliseP.textContent = ""; 
            input.classList.remove("is-invalid");
        }
    }
}
// VALIDATION DE L'EMAIL a la saisie
if(emailInput) {
    emailInput.addEventListener("input",() =>{
        const email = emailInput.value.trim(); 
        const emailValidator = Validator.emailValidator("L'email", email); 
        if(emailValidator){
            showError(emailInput, emailValidator.message);
            checkFormValidaty();
        }
        else{
            showError(emailInput, "");
            checkFormValidaty();
        }
    });
}

// VALIDATION de password a la saisie
if(passwordInput) {
    passwordInput.addEventListener("input",() =>{
        const password = passwordInput.value.trim();
        const passwordValidator = Validator.passwordValidator("le mot de passe", password, 8); 
        if(passwordValidator){
            showError(passwordInput, passwordValidator.message);
            checkFormValidaty();
        }
        else{
            showError(passwordInput, "");
            checkFormValidaty();
        }
    });
}

// activer le boutton de connexion 
function checkFormValidaty()
{
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    const emailValidator = Validator.emailValidator("L'email", email);
    const passwordValidator = Validator.passwordValidator("le mot de passe ", password, 8);
    if(!emailValidator && !passwordValidator && email !== "" && password !== ""){
        if(btnsubmit) btnsubmit.disabled = false ; 
    }
    else 
    {
        if(btnsubmit) btnsubmit.disabled = true ;
    }
} 
