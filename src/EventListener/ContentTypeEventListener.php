<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class ContentTypeEventListener
{
    /**
     * @param RequestEvent $event
     */
    public function __invoke(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if($request->isMethod(Request::METHOD_GET)) {
            return;
        }

        if (false === $this->isSupport($request)) {
            throw new UnsupportedMediaTypeHttpException();
        }
        try {
            $this->transformJsonBody($request);
        } catch (\JsonException $e) {
            $event->setResponse(new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST));
        }
    }

    /**
     * @param Request $request
     * @throws \JsonException
     */
    private function transformJsonBody(Request $request): void
    {
        $data = json_decode((string)$request->getContent(), true, 512, \JSON_THROW_ON_ERROR);
        if (is_array($data)) {
            $request->request->replace($data);
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isSupport(Request $request): bool
    {
        return ('json' === $request->getContentType() && $request->getContent());
    }

}