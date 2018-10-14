<?php

declare(strict_types=1);

namespace App\Handler\User;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserEditHandler implements RequestHandlerInterface
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
        $body = $request->getParsedBody();

        $user = $this->entityManager->find('App\Entity\User',$id);

        if ($user !== null){

            try{

                $user->saveUser($body);

                $this->entityManager->persist($user);
                $this->entityManager->flush();

                return new JsonResponse('User was updated successfuly');

            }catch (\Exception $e){
                echo $e->getMessage();die;
            }

        }
    }
}
