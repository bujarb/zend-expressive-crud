<?php

declare(strict_types=1);

namespace App\Handler;

use App\Form\UserForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $nameInCapital = "";
        $form = new UserForm();
        if ($request->getMethod() == 'POST'){

            $data = $request->getParsedBody();
            $name = $data['name'];

            if (empty($name)){

                return new RedirectResponse('/');

            }

            $nameInCapital = ucwords($name);

        }

        // Render and return a response:
        return new HtmlResponse($this->renderer->render(
            'app::home-page',
            [
                'name' => $nameInCapital,
                'form' => $form
            ] // parameters to pass to template
        ));
    }
}
