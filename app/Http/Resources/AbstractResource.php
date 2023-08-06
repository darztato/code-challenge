<?php

declare(strict_types=1);

namespace App\Http\Resources;

use DateTimeInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

abstract class AbstractResource extends JsonResource
{
    protected function createDateToCarbon(DateTimeInterface $dateTime): Carbon
    {
        $carbon = new Carbon($dateTime);
        $carbon->setTimezone($this->getDefaultTimezone());

        return $carbon;
    }

    protected function getDefaultTimezone(): string
    {
        return 'UTC';
    }

    protected function iso8601DateTime(DateTimeInterface $dateTime): string
    {
        return $this->createDateToCarbon($dateTime)->toIso8601String();
    }

    /**
     * @return null|array{readable: string, iso: string}
     */
    protected function makeDateTime(?DateTimeInterface $dateTime = null): ?array
    {
        if ($dateTime === null) {
            return null;
        }

        return [
            'readable' => $this->readableDateTime($dateTime),
            'iso' => $this->iso8601DateTime($dateTime),
        ];
    }

    protected function readableDateTime(DateTimeInterface $dateTime): string
    {
        return $this->createDateToCarbon($dateTime)->diffForHumans();
    }
}
