<?php
namespace App\Handler;

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\WebSocket\Frame;
// use Swoole\WebSocket\Server;
use SwooleBundle\SwooleBundle\Server;

class ChatHandler
{
    public function onOpen(Server $server, Request $request)
    {
        echo "New connection established: #{$request->fd}\n";
    }

    public function onMessage(Server $server, Frame $frame)
    {
        echo "Received message from #{$frame->fd}: {$frame->data}\n";
        foreach ($server->connections as $fd) {
            if ($server->isEstablished($fd)) {
                $server->push($fd, $frame->data);
            }
        }
    }

    public function onClose(Server $server, int $fd)
    {
        echo "Connection closed: #{$fd}\n";
    }
}
