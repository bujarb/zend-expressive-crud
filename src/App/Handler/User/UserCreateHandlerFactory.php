<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserCreateHandlerFactory
{
    public function __invoke(ContainerInterface $container) : UserCreateHandler
    {
        $em = $container->get('doctrine.entity_manager.orm_default');
        return new UserCreateHandler($container->get(TemplateRendererInterface::class),$em);
    }
}
