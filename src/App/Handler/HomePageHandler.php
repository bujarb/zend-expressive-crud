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

    private $template;

    private $entityManager;

    public function __construct(
        Router\RouterInterface $router,
        Template\TemplateRendererInterface $template = null,
        string $containerName,
        EntityManager $entityManager
    ) {
        $this->router        = $router;
        $this->template      = $template;
        $this->containerName = $containerName;
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return new JsonResponse($this->entityManager->getRepository('App\Entity\User')->findAll());
    }
}
