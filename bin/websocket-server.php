<?php

use App\WebSocket\ChatHandler;
// use Swoole\WebSocket\Server as WebSocketServer;

require __DIR__ . '/../vendor/autoload.php';

$server = new WebSocketServer("0.0.0.0", 9502);

$chatHandler = new ChatHandler();

$server->on('open', [$chatHandler, 'onOpen']);
$server->on('message', [$chatHandler, 'onMessage']);
$server->on('close', [$chatHandler, 'onClose']);

echo "WebSocket server started at ws://0.0.0.0:9502\n";

$server->start();
