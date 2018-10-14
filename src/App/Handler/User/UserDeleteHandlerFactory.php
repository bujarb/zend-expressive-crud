<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserDeleteHandlerFactory
{
    public function __invoke(ContainerInterface $container) : UserDeleteHandler
    {
        $em = $container->get('doctrine.entity_manager.orm_default');
        return new UserDeleteHandler($container->get(TemplateRendererInterface::class),$em);
    }
}
