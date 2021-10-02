<?php

declare(strict_types=1);

namespace Website\Tests\Home;

use Laminas\Diactoros\Response\HtmlResponse;
use PHPUnit\Framework\TestCase;
use Website\Home\HomeController;

class HomeControllerTest extends TestCase
{
    private $template;
    private $request;
    private HomeController $controller;

    protected function setUp(): void
    {
        $this->template = $this->createMock('Website\Template\ITemplate');
        $this->request = $this->createMock('Psr\Http\Message\ServerRequestInterface');
        $this->controller = new HomeController(
            $this->template
        );

        $this->request->method('getParsedBody')
            ->willReturn([]);
    }

    protected function tearDown(): void
    {
        unset($this->template);
        unset($this->request);
        unset($this->controller);
    }

    public function testHome_ReturnsRouteNotFound(): void
    {
        $args = ['page' => 'grain'];

        $actual = $this->controller->index($this->request, $args);
        $this->assertEquals(['/' . HomeController::NOT_FOUND], $actual->getHeader('location'));
    }

    public function testHome_ReturnsResponse(): void
    {
        $content = 'Velit nisi excepteur in incididunt ex enim fugiat nisi et. Culpa fugiat aliquip officia tempor tempor. Ad ipsum aliqua quis proident sint labore Lorem nostrud nulla sit.';
        $args = ['page' => 'about'];

        $this->template->expects($this->once())
            ->method('render')
            ->with("{$args['page']}.twig", $args)
            ->willReturn($content);

        $expected = new HtmlResponse($content);
        
        $actual = $this->controller->index($this->request, $args);
        $this->assertEquals((string) $expected->getBody(), (string) $actual->getBody());
    }
}