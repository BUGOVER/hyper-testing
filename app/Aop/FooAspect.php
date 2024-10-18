<?php

declare(strict_types=1);

namespace App\Aop;

use App\Annotation\SomeAnnotation;
use App\Controller\IndexController;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

#[Aspect(classes: [IndexController::class . '::' . 'index'])]
class FooAspect extends AbstractAspect
{
    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        // After the Aspect is cut into, the corresponding method will be responsible by this method.
        // $proceedingJoinPoint is the joining point, the original method is called by the process() method of the class and obtain the result.
        // Do something before original method
        // Do something after original method
        return $proceedingJoinPoint->process();
    }
}
