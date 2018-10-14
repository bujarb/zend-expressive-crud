<?php

declare(strict_types=1);

namespace App\Handler\User;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserCreateHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;
    private $entity_manager;

    public function __construct(TemplateRendererInterface $renderer, EntityManager $entity_manager)
    {
        $this->renderer = $renderer;
        $this->entity_manager = $entity_manager;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $method = $request->getMethod();

        if($method == 'POST'){

            $body = $request->getParsedBody();

            try{

                $user = new User();
                $user->saveUser($body);
                $this->entity_manager->persist($user);
                $this->entity_manager->flush();

            }catch (\Exception $e){
                echo $e->getMessage();
                die;
            }
        }
    }
}
