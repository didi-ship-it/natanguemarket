<?php
require_once("../../model/ProduitRepository.php");

class ProduitController
{
    private $produitRepository;

    public function __construct()
    {
        $this->produitRepository = new ProduitRepository();
    }

     // Permet de faire la gestion des erreurs
    public function setErrorAndRedirect($message, $title, $redirectUrl = "listeprod"): never{
    
        $_SESSION["error"] = $message;
        header("Location: $redirectUrl?error=1&message=" . urldecode($message) . "&title=" . urldecode($title));
        exit;
    }

    /**
     * Permet d'ajouter un produit dans la base de données
     */
    public function addProduit() : void 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $nom = trim($_POST['nom'] ?? "");
            $description = trim($_POST['description'] ?? "");
            $prix = trim($_POST['prix'] ?? "0");
            $quantite = trim($_POST['quantite'] ?? "0");
            $createdby = $_SESSION['id'] ?? null;
            $photo = $_FILES['photo'] ?? null;

            if (empty($nom) || empty($prix)) || empty($quantite) || !$photo {
            this-> setErrorAndRedirect($messageError,"Erreur de connexion", "login");
            }

            $nomPhoto = null;
            if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
                // Exemple basique de déplacement de fichier
                $dossierDestination = "../../public/uploads/produits/";
                $nomPhoto = time() . "_" . basename($photo['name']);
                move_uploaded_uploaded_file($photo['tmp_name'], $dossierDestination . $nomPhoto);
            }

            
         
        }
    }
}
?>
