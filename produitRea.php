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
            $categorie = trim($_POST['categorie'] ?? "");
            $prix = trim($_POST['prix'] ?? "0");
            $quantite = trim($_POST['quantite'] ?? "0");
            $createdby = $_SESSION['id'] ?? null;
            $photo = $_FILES['photo'] ?? null;

            if (empty($nom) || empty($prix)) || empty($quantite) || !$photo {
            this-> setErrorAndRedirect("Tous les chamnps sont obligatoire", "erreur d'ajout");
            }
            // validation photo
            $nomPhoto = null;
            if ($photo['error'] == UPLOAD_ERR_OK) {
                 this-> setErrorAndRedirect("Une erreur est survenue lors du telechargement de la photo ", $photo['error']);
                 }
            //validation categorie


            //Telechargement photo 
            $uploadDir  = "../../public/image/produitRea";
            $photoName = uniqid()."_" . basename($phovto['name']);
            $uploadPath = $uploadDir . $photoName;

             // deplacement de la photo
                if(move_uploaded_file($photo['tmp_name'], $uploadPhath)) {
                this-> setErrorAndRedirect("Echec du telechargement de l'image", $photo['error']);

            }
                
           // appele de la methode add pour inserer dans la base de données
        try {
            this->produitRepository->add($nom, $description, $categorie, $prix, $quantite, $photoName, $createdby);
        }cath(\throwable $th) {
            
            }

            
         }
    }
}
?>
