<?php

declare(strict_types=1);

namespace App\Dto\Link;

use App\Dto\DtoInterface;

class LinkCreateDto implements DtoInterface
{
    public function __construct(
        public readonly string $url,
        public readonly string $keyword,
        public readonly string $title
    ) {
    }
}