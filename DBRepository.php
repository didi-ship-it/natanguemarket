<?php
  class DBRepository
  {
    private $host;
    private $dbname;
    private $user;
    private $password;
    protected $db;

    public function __construct()
    {
      $this->host = getenv(name : 'DB_HOST')?:"localhost";
      $this->dbname =getenv(name : 'DB_NAME')?:"natanguemarket2";
      $this->user = getenv(name : 'DB_USER')?:"root";
      $this->password = getenv(name : 'DB_PASSWORD')?:"";
      $this->getconnexion();
    }
    
    //Permet de connecter bd
    private function getconnexion()
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