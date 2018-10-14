<?php

declare(strict_types=1);

namespace App\Handler\User;

use Doctrine\ORM\EntityManager;
use PHPUnit\Util\Json;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserDeleteHandler implements RequestHandlerInterface
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
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $id = (int)$request->getAttribute('id');
        $user = $this->entityManager->find('App\Entity\User',$id);

        if ($user === null){

            return new JsonResponse("The user was not found");

        }
        
        $this->entityManager->remove($user);
        $this->entityManager->flush();

        return new JsonResponse('The user was successfuly deleted');
    }
}
