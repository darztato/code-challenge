<?php

declare(strict_types=1);

namespace App\StoredEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;
use Auth0\Laravel\StateInstance;

abstract class AbstractStoredEvent extends ShouldBeStored
{
    // @todo: Will add Auth ID in meta column
    /**
     * @return array<string, mixed>
     */
    // public function metaData(): array
    // {
    //     return [
    //         ...$this->metaData,
    //         'id' => auth()->user()?->getAuthIdentifier(),
    //     ];
    // }
}
