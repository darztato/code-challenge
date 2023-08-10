<?php

declare(strict_types=1);

namespace App\Http\Resources;

final class CreateOnlyIdResource extends AbstractWriteResource
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
