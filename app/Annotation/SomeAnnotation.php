<?php

declare(strict_types=1);

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

#[\Attribute]
class SomeAnnotation extends AbstractAnnotation
{
    public function __construct()
    {
    }
}
