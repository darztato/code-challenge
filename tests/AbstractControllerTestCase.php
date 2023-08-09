<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class AbstractControllerTestCase extends AbstractUpdateTestCase
{
    use RefreshDatabase;

    protected ?int $statusCode = null;

    private ?array $routeParams = null;

    abstract protected function getRouteName(): string;

    protected function assertStatusCode(int $expectedStatusCode): void
    {
        self::assertEquals($expectedStatusCode, $this->getStatusCode());
    }

    protected function getResponse(): ?array
    {
        /** @var \Illuminate\Http\JsonResponse|null $response */
        $response = $this
            ->getJson($this->getRoute());

        if ($response === null) {
            return null;
        }

        $this->setStatusCode($response->getStatusCode());

        return \json_decode($response->getContent(), true);
    }

    protected function getRoute(?array $routeParam = null): string
    {
        return \route($this->getRouteName(), $routeParam ?? $this->routeParams ?? []);
    }

    protected function setRouteParams(?array $routeParam = null): self
    {
        $this->routeParams = $routeParam;

        return $this;
    }

    protected function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    protected function setStatusCode(?int $statusCode = null): void
    {
        $this->statusCode = $statusCode;
    }
}
