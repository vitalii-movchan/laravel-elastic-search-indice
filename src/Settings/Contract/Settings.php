<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Settings\Contract;

/**
 * @class Settings
 */
interface Settings
{
    /**
     * @return array
     */
    public function toArray(): array;
}
