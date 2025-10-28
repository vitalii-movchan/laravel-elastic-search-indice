<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\Bulk;

use Elastic;
use Illuminate;


/**
 * @final
 * @readonly
 * @class IndexRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\Bulk\BulkRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class BulkRepository implements
     Elastic\Elasticsearch\Indice\Repository\Contract\Bulk\BulkRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param Illuminate\Support\Collection $indices
     * @return Elastic\Elasticsearch\Indice\Repository\Contract\Bulk\BulkRepository
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function deleteIndices(Illuminate\Support\Collection $indices): self
    {
        $indices->each(
            function (string $index) {
                $this->client->indices()
                    ->delete([
                        'index' => $index,
                    ]);
            }
        );

        $this->client->getLogger()->info("Delete indices", [
            'indices' => $indices,
        ]);

        return $this;
    }

    /**
     * @param array $actions
     * @return Elastic\Elasticsearch\Indice\Repository\Contract\Bulk\BulkRepository
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function updateAliases(array $actions): self
    {
        $this->client->indices()
            ->updateAliases([
                'body' => [
                    'actions' => $actions,
                ],
            ]);

        $this->client->getLogger()->info("Update aliases", [
            'actions' => $actions,
        ]);

        return $this;
    }
}
