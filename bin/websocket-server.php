<?php

use App\WebSocket\ChatHandler;
// use Swoole\WebSocket\Server as WebSocketServer;
use SwooleBundle\SwooleBundle\Server as WebSocketServer;

require __DIR__ . '/../vendor/autoload.php';

$server = new WebSocketServer("127.0.0.1", 9501);

$chatHandler = new ChatHandler();

$server->on('open', [$chatHandler, 'onOpen']);
$server->on('message', [$chatHandler, 'onMessage']);
$server->on('close', [$chatHandler, 'onClose']);

echo "WebSocket server started at ws://0.0.0.0:9501\n";

$server->start();
