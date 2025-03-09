<?php

class ApiController
{
    public $data = [];
    public $conn;
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-Type: application/json');
        $this->data = json_decode(file_get_contents('php://input'), true);
        $database = new Database();
        $db = $database->connect();
        $this->conn = $db;
    }
    public function login()
    {
        $numberCard = $this->data['numberCard'];
        $pin = $this->data['pin'];
        if (!$numberCard || !$pin) {
            return $this->error('Number card and pin are required');
        }


        $tarjeta = (new Tarjeta($this->conn))->login($numberCard, $pin);
        if ($tarjeta === false) {
            return $this->error('Number card or pin are incorrect');
        }

        $token = $tarjeta->NewToken();
        $usario = $tarjeta->getUsuario();
        $this->success([
            'numberCard' => $numberCard,
            'token' => $token,
            'user' => $usario
        ]);
    }
    public function accounts()
    {
        $token = $this->validateToken();
        if (!$token) {
            return $this->error('Token is invalid', 401);
        }
        $cuentas  = $token->getCuentas();
        $this->success($cuentas);
    }
    /**
     * @return Token|null
     */
    protected function validateToken()
    {
        // vemos en la peticion actual el token en autorization o X-Mi-Token
        $token = null;
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $token = $_SERVER['HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['HTTP_X_MI_TOKEN'])) {
            $token = $_SERVER['HTTP_X_MI_TOKEN'];
        }
        // eliminar Bearer 
        $token = str_replace('Bearer ', '', $token);
        return Token::validate($token, $this->conn);
    }
    protected function success($data = [], $statusCode = 200)
    {
        return self::json([
            'success' => true,
            'data' => $data
        ], $statusCode);
    }


    protected function error($data = [], $statusCode = 400)
    {
        return self::json([
            'success' => false,
            'data' => $data
        ], $statusCode);
    }
    public static function json($data, $statusCode = 200, $headers = ['Content-Type' => 'application/json'])
    {
        http_response_code($statusCode);
        foreach ($headers as $name => $value) {
            header("$name: $value");
        }
        echo json_encode($data);
        exit;
    }
}
