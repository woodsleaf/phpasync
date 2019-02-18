<?php
require '../vendor/autoload.php';
use App\Su;
$vSu = new Su();
echo $vSu->suInfo();
use React\Http\Server;
use React\Http\Response;
use Psr\Http\Message\ServerRequestInterface;
$loop = React\EventLoop\Factory::create();
$server = new Server(
    function (ServerRequestInterface $request) {
        return new Response(
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8'],
            "Привет, мир"
        );
    }
);
$socket = new React\Socket\Server(8080, $loop); // 8080
$server->listen($socket);
echo 'Работает на '
    . str_replace('tcp:', 'http:', $socket->getAddress())
    . PHP_EOL;
$loop->run();
