<?php

declare(strict_types=1);

namespace App\Http\Requests;

class SearchQueryRequest extends PerPageQueryRequest
{
    public function getSearchQuery(): string
    {
        return $this->validated('query');
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'query' => [
                'required',
                'string',
            ],
        ];
    }
}
