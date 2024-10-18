<?php

declare(strict_types=1);

namespace App\Controller\Ws;

use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnHandShakeInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;

class WsController implements OnMessageInterface, OnOpenInterface, OnCloseInterface, OnHandShakeInterface
{
    public function onMessage($server, $frame): void
    {
        $server->push($frame->fd, 'Recv: ' . $frame->data);
    }

    public function onClose($server, int $fd, int $reactorId): void
    {
        var_dump('closed');
    }

    public function onOpen($server, $request): void
    {
        $server->push($request->fd, 'Opened');
    }

    public function onHandShake($request, $response): void
    {
        // TODO: Implement onHandShake() method.
    }
}
