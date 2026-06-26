<?php
    session_start();
    require_once("../../model/UserRepository.php");
   class UserController{

 // Objet
    $userRepository = new UserRepository();

    // Permet de valider l'email et le password
    function validateLoginFields($email, $password): string|null {
    
        if (empty($email) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Oups! L'email fourni est invalide."; 
        }

        return null;
    }
        
    // Permet de faire la gestion des erreurs
    function setErrorAndRedirect($message, $title, $redirectUrl = "login"): never{
    
        $_SESSION["error"] = $message;
        header("Location: $redirectUrl?error=1&message=" . urldecode($message) . "&title=" . urldecode($title));
        exit;
    }

    // Permet d'authentifier le super admin 
    function authSuperAdmin($email, $password): bool{
    
        if ($email === "admin@admin.com" && $password === "admin123")
        {
            $_SESSION["id"] = 1;
            $_SESSION["email"] = $email;
            $_SESSION["nom"] = "Admin";

            header("Location: admin?success=1&message=" . urldecode("Daalal ak diamb si sa page admin") . "&title=" . urldecode("Connexion reussie"));
            exit;
        }

        return false;
    
    }

    //Permet d'authentifier un admin
    
    // Permet d'authentifier un utilisateur
    function authUser($email, $password, $userRepository) : bool{
        
        $user = $userRepository->login($email, $password);
        
        if ($user) {
            $_SESSION["id"] = $user['id'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["nom"] = $user['nom'];
            $_SESSION["prenom"] = $user['prenom'];
            $_SESSION["id_role"] = $user['id_role'];

            if(isset($_POST['remember'])){
                setcookie('remember', $user['id'], time() + 86400 * 30, '/', '', false, true);
            }
            
            header("Location: home?success=1");
            exit;
        }
        
        return false;
    } 
    
    //Recupere les valeurs du formulaire
    function auth():void{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['fremlogin'])){
                $email = trim($_POST['email'] ?? '');
                $password = trim($_POST['password'] ?? '');
                
                //Validation des champs
                $messageError = validateLoginFields($email, $password);
                if($messageError){
                    setErrorAndRedirect($messageError,"Erreur de connexion", "login");
                }

                //Authentification classique de l'admin
                $authSuperAdmin = authSuperAdmin($email, $password);

                if (authUser($email, $password, $userRepository)) {
            
                } else {
                    setErrorAndRedirect("Identifiants incorrects","Erreur de connexion", "login"); 
                }
            }
        }
    }

   }
   
?>