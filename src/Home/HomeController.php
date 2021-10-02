<?php

declare(strict_types=1);

namespace Website\Home;

use Website\Template\ITemplate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;

class HomeController 
{
    const DEFAULT_PAGE = 'index';
    const NOT_FOUND = '404';
    const PAGE_LIST = [
        self::DEFAULT_PAGE,
        self::NOT_FOUND,
        'home',
        'about',
        'contact',
        'faqs',
        'features',
    ];

    private ITemplate $template;

    public function __construct(ITemplate $template)
    {
        $this->template = $template;        
    }

    public function index(RequestInterface $request, array $args): ResponseInterface
    {
        $page = $args['page'] ?? self::DEFAULT_PAGE;
        if (!in_array($page, self::PAGE_LIST)) {
            return new RedirectResponse('/' . self::NOT_FOUND);
        }
        
        $html = $this->template->render("{$page}.twig", [
            'page' => $page,
        ]);

        return new HtmlResponse($html);
    }
}