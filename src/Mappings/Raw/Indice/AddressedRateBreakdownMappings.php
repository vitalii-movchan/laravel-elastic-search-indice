<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Mappings\Raw\Index;

use Elastic;

/**
 * @class AddressedRateBreakdownMappings
 * @implements Elastic\Elasticsearch\Indice\Mappings\Contract\Mappings
 */
class AddressedRateBreakdownMappings implements Elastic\Elasticsearch\Indice\Mappings\Contract\Mappings
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
                'calculation_mode' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'data_owner_id' => [
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
                'quarter' => [
                    'type' => 'short',
                ],
                'icd_code' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'disease_category_name' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'disease_category_id' => [
                    'type' => 'text',
                    'fields' => [
                        'keyword' => [
                            'type' => 'keyword',
                            'ignore_above' => 256,
                        ],
                    ],
                ],
                'total' => [
                    'type' => 'long',
                ],
                'confirmed' => [
                    'type' => 'long',
                ],
                'confirmed_percent' => [
                    'type' => 'scaled_float',
                    'scaling_factor' => 1000000000,
                ],
                'unable_to_confirm' => [
                    'type' => 'long',
                ],
                'unable_to_confirm_percent' => [
                    'type' => 'scaled_float',
                    'scaling_factor' => 1000000000,
                ],
                'hold' => [
                    'type' => 'long',
                ],
                'hold_percent' => [
                    'type' => 'scaled_float',
                    'scaling_factor' => 1000000000,
                ],
                'pending' => [
                    'type' => 'long',
                ],
                'pending_percent' => [
                    'type' => 'scaled_float',
                    'scaling_factor' => 1000000000,
                ],
            ],
        ];
    }
}
