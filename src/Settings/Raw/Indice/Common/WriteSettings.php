<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Settings\Raw\Index\Common;

use Elastic;

/**
 * @class WriteSettings
 * @implements Elastic\Elasticsearch\Indice\Settings\Contract\Settings
 */
class WriteSettings implements Elastic\Elasticsearch\Indice\Settings\Contract\Settings
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'number_of_replicas' => 0,
            'refresh_interval' => -1
        ];
    }
}
