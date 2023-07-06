<?php
require '../vendor/autoload.php';
require_once '../config/dbConnection.php';

$dbConnection = new DBConnection();
$con = $dbConnection->connection;

use Psr\Http\Message\ResponseInterface as Resonpse;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new \Slim\App();

$app->get('/', function ($req, $res, $args = []) {
    $response = ["status" => "ok"];
    return $res->withJson($response);
});

$app->get('/user', function ($req, $res, $args = []) {
    $response = ["status" => "ok", "message" => "user"];
    return $res->withJson($response);
});

$app->get('/connection', function ($req, $res, $args = []) use ($con) {
    if (!$con) {
        $response = ["status" => "error", "message" => "no connection"];
        return $res->withJson($response);
    }

    // $sql = "SELECT * FROM users";
    // $result = mysqli_query($con, $sql);


    // $row = mysqli_fetch_assoc($result);

    $response = ["status" => "ok", "message" => "connected", "data" => null];
    return $res->withJson($response);
});

$app->run();
