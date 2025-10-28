<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Mappings\Raw\Index;

use Elastic;

/**
 * @class PatientLevelCGMappings
 * @implements Elastic\Elasticsearch\Indice\Mappings\Contract\Mappings
 */
class PatientLevelCGMappings implements Elastic\Elasticsearch\Indice\Mappings\Contract\Mappings
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'properties' => [
                'doc_hash' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'year' => [
                    'type' => 'short',
                ],
                'time_factor' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'month' => [
                    'type' => 'short',
                ],

                'providers' => [
                    'type' => 'long',
                ],
                'members' => [
                    'type' => 'long',
                ],
                'total_cg' => [
                    'type' => 'long',
                ],
                'diagnosed_cg' => [
                    'type' => 'long',
                ],
                'not_diagnosed_cg' => [
                    'type' => 'long',
                ],
                'snoozed_cg' => [
                    'type' => 'long',
                ],
                'pending_cg' => [
                    'type' => 'long',
                ],
            ],
        ];
    }
}
