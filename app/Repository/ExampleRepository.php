<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\ExampleModel;

class ExampleRepository
{
    public function __construct(private readonly ExampleModel $model)
    {
    }
}
