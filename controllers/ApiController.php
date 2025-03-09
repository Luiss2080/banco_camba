<?php

class ApiController
{
    public $data = [];
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-Type: application/json');
        $this->data = json_decode(file_get_contents('php://input'), true);
    }
    public function login()
    {
        $numberCard = $this->data['numberCard'];
        $pin = $this->data['pin'];
        if (!$numberCard || !$pin) {
            return $this->error('Number card and pin are required');
        }
        $database = new Database();
        $db = $database->connect();
        
        $tarjeta = (new Tarjeta($db))->login($numberCard, $pin);
        if ($tarjeta === false) {
            return $this->error('Number card or pin are incorrect');
        }
        $this->success([
            'numberCard' => $numberCard,
            'token'=> $tarjeta->NewToken(),
        ]);
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
