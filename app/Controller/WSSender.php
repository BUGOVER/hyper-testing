<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\WebSocketServer\Sender;

class WSSender
{
    #[Inject]
    protected Sender $sender;

    public function close(int $fd)
    {
        go(function () use ($fd) {
            sleep(1);
            $this->sender->disconnect($fd);
        });

        return '';
    }

    public function send(int $fd)
    {
        $this->sender->push($fd, 'Hello World.');

        return '';
    }
}
