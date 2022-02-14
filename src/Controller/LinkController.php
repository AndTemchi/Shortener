<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\Link\LinkCreateDto;
use App\Service\LinkServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/link", format="json", name="link_")
 */
class LinkController extends AbstractController
{
    /**
     * @Route(methods={"POST"}, name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, LinkServiceInterface $linkService): Response
    {
        //todo: validation;
        $request = $request->request->all();

        $createDto = new LinkCreateDto(
            $request['url'],
            $request['keyword'],
            $request['title']
        );
        $id = $linkService->create($createDto);

        return new JsonResponse(['id' => $id->getId()], Response::HTTP_CREATED);
    }

    /**
     * @Route ("/{id}", methods={"PATCH"}, name="update")
     * @param string $id
     * @return Response
     */
    public function update(string $id): Response
    {
    }

    /**
     * @Route ("/{id}", methods={"DELETE"}, name="delete")
     * @param string $id
     * @return Response
     */
    public function delete(string $id): Response
    {
    }

    /**
     * @Route ("/{id}", methods={"GET"}, name="show")
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        return new Response("hello world $id", 200);
    }
}