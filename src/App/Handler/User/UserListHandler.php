<?php

declare(strict_types=1);

namespace App\Handler\User;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserListHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    private $entityManager;

    public function __construct(TemplateRendererInterface $renderer,EntityManager $entityManager)
    {
        $this->renderer = $renderer;
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritDoc}
     * Method to list all users from the database
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {

        if($request->getMethod() == 'GET'){

            $all_users = $this->entityManager->getRepository('App\Entity\User')->findAll();

        }

        return new JsonResponse($all_users,200);
    }
}
