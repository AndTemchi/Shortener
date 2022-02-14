<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Link\LinkCreateDto;
use App\Entity\Link;
use App\Entity\ValueObject\IdentifierInterface;
use App\Repository\LinkRepositoryInterface;

class LinkService implements LinkServiceInterface
{

    public function __construct(private LinkRepositoryInterface $linkRepository)
    {
    }

    public function create(LinkCreateDto $dto): IdentifierInterface
    {
        $link = new Link(
            $dto->url,
            $dto->keyword,
            $dto->title,
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );

        return $this->linkRepository->save($link);
    }
}