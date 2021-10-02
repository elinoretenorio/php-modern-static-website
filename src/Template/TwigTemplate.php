<?php

declare(strict_types=1);

namespace Website\Template;

use Twig\Environment as Twig;

class TwigTemplate implements ITemplate
{
    private Twig $template;

    public function __construct(Twig $template) 
    {
        $this->template = $template;
    }

    public function render(string $file, array $tags): string
    {
        return $this->template->render($file, $tags);
    }
}