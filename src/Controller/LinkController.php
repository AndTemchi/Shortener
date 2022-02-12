<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function create(Request $request): Response
    {
        return new Response('hello world' . $request, 200);
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
        $response = new Response("hello world $id", 200);
        return $response;
    }
}