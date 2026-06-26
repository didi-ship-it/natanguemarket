<?php 
require_once('DBRepository.php');

class UserRepository extends DBRepository
{
    // Permet de creer un compte utilisateur(CREATE)
    public function register($nom, $prenom, $adresse, $tel, $photo, $email, $password) 
    {
        $sql = "INSERT INTO Users (nom, prenom, adresse, telephone, photo, email, password, etat, id_role) 
                VALUES (:nom, :prenom, :adresse, :telephone, :photo, :email, :password, :etat, :id_role)";

        try {
            $statement = $this->db->prepare($sql);
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $id_role = 1; 

            $statement->execute([
                'nom'       => $nom,
                'prenom'    => $prenom,
                'adresse'   => $adresse,
                'telephone' => $tel,
                'photo'     => $photo,
                'email'     => $email,
                'password'  => $hashPassword,
                'etat'      => 1, 
                'id_role'   => $id_role 
            ]);

            $lastInsertId = $this->db->lastInsertId();
            return $lastInsertId ?: null;

        } catch (PDOException $error) {
            error_log("Erreur lors de la creation du compte utilisateur : " . $error->getMessage());
            throw $error;
        }
    }
    

    // Permet de récupérer tous les utilisateurs(READ)
    public function getAllUsers(): array
    {
        $sql = "SELECT id, nom, prenom, adresse, telephone, email, etat FROM Users ORDER BY id DESC";
        
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $error) {
            error_log("Erreur lors de la récupération des utilisateurs : " . $error->getMessage());
            return [];
        }
    }


    // Permet d'authentifier un utilisateur 
    public function login($email, $password): array|bool|null
    {
        $sql = "SELECT * FROM Users WHERE email = :email AND etat = 1";
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute(['email' => $email]);  
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                return $user; 
            } else {
                return false;
            }
        } catch (PDOException $error) {
            error_log("Erreur de la recuperation lors de la connexion : " . $error->getMessage());
            throw $error;
        }
    }
}
?>