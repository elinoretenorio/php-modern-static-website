<?php

declare(strict_types=1);

namespace Website\Template;

interface ITemplate
{
    public function render(string $file, array $tags): string;
}