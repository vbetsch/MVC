<?php


class db_connect
{
    private $host = 'localhost';
    private $name = 'mvc';
    private $user = 'root';
    private $pass = '';

    private $conn;
    public $status;

    public function __construct()
    {
        try {

            // Instanciation d'une connection à la base de Donnée (PDO => Php Data Object)
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->name . ";charset=utf8;", $this->user, $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            $this->status = $error->getMessage();
            var_dump($this->status);
        }
    }

    public function execute(string $query, array $params = [])
    {
        /*
         * Execute la query donné en associant les paramètres données
         * Si $params est vide, aucune valeur n'est associée
         *
         * $query = 'select a from b where c = :id'
         * $params = ['id' => 'foo']
         */
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

}
