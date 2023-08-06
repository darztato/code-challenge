<?php

declare(strict_types=1);

namespace App\Http\Requests;

class PerPageQueryRequest extends AbstractFormRequest
{
    public const PAGE_NUMBER_KEY = 'page';

    public const PER_PAGE_KEY = 'per_page';

    public function authorize(): bool
    {
        return true;
    }

    public function getPageNumber(): ?int
    {
        /** @var int|null $pageNumber */
        $pageNumber = $this->query(self::PAGE_NUMBER_KEY);

        return $pageNumber !== null ? (int) $pageNumber : null;
    }

    public function getPerPage(): ?int
    {
        /** @var int|null $perPage */
        $perPage = $this->query(self::PER_PAGE_KEY);

        return $perPage !== null ? (int) $perPage : null;
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            self::PAGE_NUMBER_KEY => [
                'integer',
            ],
            self::PER_PAGE_KEY => [
                'integer',
            ],
        ];
    }
}
