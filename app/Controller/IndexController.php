<?php

declare(strict_types=1);

/*
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Annotation\SomeAnnotation;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use JetBrains\PhpStorm\ArrayShape;

#[Controller()]
#[SomeAnnotation]
class IndexController extends AbstractController
{
    #[ArrayShape(['method' => 'string', 'message' => 'string'])]
    #[RequestMapping(path: '/', methods: ['GET', 'HEAD', 'POST'])]
    public function index(): array
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello $user.",
        ];
    }
}
