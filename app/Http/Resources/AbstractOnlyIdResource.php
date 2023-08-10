<?php

declare(strict_types=1);

namespace App\Http\Resources;

abstract class AbstractOnlyIdResource extends AbstractResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['uuid'],
        ];
    }
}
