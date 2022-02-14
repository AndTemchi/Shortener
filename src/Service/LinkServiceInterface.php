<?php
declare(strict_types=1);

namespace App\Service;

use App\Dto\Link\LinkCreateDto;
use App\Entity\ValueObject\IdentifierInterface;

interface LinkServiceInterface
{
    public function create(LinkCreateDto $dto): IdentifierInterface;
}