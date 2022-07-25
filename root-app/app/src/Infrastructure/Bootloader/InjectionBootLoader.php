<?php

declare(strict_types=1);

namespace App\Infrastructure\Bootloader;

use App\Application\Dependencies\IO\InputInterface;
use App\Application\Dependencies\Validation\ValidationInterface;
use App\Domain\Repository\ClassesRepositoryInterface;
use App\Infrastructure\Repository\ClassesRepository;
use App\Infrastructure\Request\InputPayload;
use App\Infrastructure\Validator\Validator;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Core\Container;

class InjectionBootLoader extends Bootloader
{
    public function boot(Container $container): void
    {
        $container->bindSingleton(ClassesRepositoryInterface::class, fn() => new ClassesRepository());
        $container->bindSingleton(InputInterface::class, fn() => new InputPayload());
        $container->bindSingleton(
            ValidationInterface::class,
            fn() => new Validator($container->get(\Spiral\Validation\ValidationInterface::class))
        );
    }
}
