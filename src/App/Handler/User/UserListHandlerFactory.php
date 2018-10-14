<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserListHandlerFactory
{
    public function __invoke(ContainerInterface $container) : UserListHandler
    {
        $em = $container->get('doctrine.entity_manager.orm_default');
        return new UserListHandler($container->get(TemplateRendererInterface::class),$em);
    }
}
