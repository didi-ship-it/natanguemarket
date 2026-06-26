<?php 
require_once("DBRepository.php");
 class ProduitRepository extends DBRepository
 {
    //Recupere la liste des produits
    public function getAll(): all
    {
        $sql="SELECT * FROM produits WHERE est_local = 1 ";
        try{
          $statement = $this -> db ->query($sql);     
          return $statement -> fectchAll(PDO::FETCH_ASSOC)  }
        catch(PDOException $error){
            error_log(message:"erreur de la recuperation de votre produit")
            throw $error
        }
    }

     private function getconnexion() :void
    {
      $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
      try {
          $this->db = new PDO( dsn:$dsn, username: $this->user, password: $this->password);
          $this->db->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $error) {
        error_log(message: "Erreur de connexion a la BD: " . $error->getMessage());
       die("Une erreur est survenue lors  de la connexion à la base de données.");     
        }
      return $this->db;
    }

 }
?>