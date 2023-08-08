<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractWriteResource extends AbstractResource
{
    public function withResponse($request, $response): void
    {
        $response->setStatusCode(Response::HTTP_CREATED);
    }
}
