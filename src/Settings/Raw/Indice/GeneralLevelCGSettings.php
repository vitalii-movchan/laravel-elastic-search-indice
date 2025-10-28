<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Settings\Raw\Index;

use Elastic;

/**
 * @class GLCGSettings
 * @implements Elastic\Elasticsearch\Indice\Settings\Contract\Settings
 */
class GeneralLevelCGSettings implements Elastic\Elasticsearch\Indice\Settings\Contract\Settings
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'number_of_replicas' => 1,
            'refresh_interval' => '5s',
            'max_result_window' => 500000,
        ];
    }
}
