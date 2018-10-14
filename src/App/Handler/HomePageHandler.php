<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\User;
use App\Form\UserForm;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;

class HomePageHandler implements RequestHandlerInterface
{
    private $containerName;
    private $router;

    public function __construct(
        Router\RouterInterface $router,
        string $containerName
    ) {
        $this->router        = $router;
        $this->containerName = $containerName;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return new JsonResponse("API for CRUD with Zend Expressive 3");
    }
}
