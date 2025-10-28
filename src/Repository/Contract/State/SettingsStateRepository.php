<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Contract\State;

/**
 * @class SettingsRepository
 */
interface SettingsStateRepository
{
    /**
     * @param string $index
     * @param array $settings
     * @return self
     */
    public function put(string $index, array $settings): self;
}
