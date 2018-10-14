<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserEditHandlerFactory
{
    public function __invoke(ContainerInterface $container) : UserEditHandler
    {
        $em = $container->get('doctrine.entity_manager.orm_default');
        return new UserEditHandler($container->get(TemplateRendererInterface::class),$em);
    }
}
