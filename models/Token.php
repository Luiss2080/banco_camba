<?php

class Token
{
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
    public function crear()
    {
        if (empty($this->token) || empty($this->fechaCreacion) || empty($this->fechaExpiracion) || empty($this->idTarjeta)) {
            return false;
        }
        $query = 'INSERT INTO token SET token = :token, fechaCreacion = :fechaCreacion, fechaExpiracion = :fechaExpiracion, idTarjeta = :idTarjeta';
        $stmt = $this->conn->prepare($query);
        $this->token = htmlspecialchars(strip_tags($this->token));
        $this->fechaCreacion = htmlspecialchars(strip_tags($this->fechaCreacion));
        $this->fechaExpiracion = htmlspecialchars(strip_tags($this->fechaExpiracion));
        $this->idTarjeta = htmlspecialchars(strip_tags($this->idTarjeta));
        $stmt->bindParam(':token', $this->token);
        $stmt->bindParam(':fechaCreacion', $this->fechaCreacion);
        $stmt->bindParam(':fechaExpiracion', $this->fechaExpiracion);
        $stmt->bindParam(':idTarjeta', $this->idTarjeta);

        if ($stmt->execute()) {
            $this->idToken = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }
}
