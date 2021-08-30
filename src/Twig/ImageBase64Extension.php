<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ImageBase64Extension extends AbstractExtension
{
    public function __construct(
        private string $basePath
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('image_base64', [$this, 'imageBase64']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('image_base64', [$this, 'imageBase64']),
        ];
    }

    public function imageBase64(string $path)
    {
        return sprintf(
            'data:image/%s;base64,%s',
            pathinfo($path, PATHINFO_EXTENSION),
            base64_encode(file_get_contents(rtrim($this->basePath, '/').'/'.$path))
        );
    }
}
