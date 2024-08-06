<?php

namespace App\WebSocket;

use Swoole\WebSocket\Server as WebSocketServer;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

class ChatHandler
{
    public function onOpen(WebSocketServer $server, Request $request)
    {
        echo "Nouvelle connexion : {$request->fd}\n";
    }

    public function onMessage(WebSocketServer $server, Frame $frame)
    {
        echo "Nouveau message : {$frame->data}\n";
        $server->push($frame->fd, "Message reçu : {$frame->data}");
    }

    public function onClose(WebSocketServer $server, int $fd)
    {
        echo "Connexion fermée : {$fd}\n";
    }
}
