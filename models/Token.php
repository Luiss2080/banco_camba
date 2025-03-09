<?php 

class Token {
    private $conn;

    public $idToken;
    public $token;
    public $fechaCreacion;
    public $fechaExpiracion;
    public $idTarjeta;
    /**
     * Constructor con DB
     * @param PDO $db
     */
    public function __construct($db)
    {
        $this->conn = $db;
    }
}