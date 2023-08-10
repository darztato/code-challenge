<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Symfony\Component\HttpFoundation\Response;

final class GenericOnlyIdResource extends AbstractOnlyIdResource
{
    public function withResponse($request, $response): void
    {
        $response->setStatusCode(Response::HTTP_OK);
    }
}
