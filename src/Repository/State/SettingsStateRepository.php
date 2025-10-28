<?php

declare(strict_types=1);

namespace Elastic\Elasticsearch\Indice\Repository\State;

use Elastic;

/**
 * @final
 * @readonly
 * @class SettingsRepository
 * @implements Elastic\Elasticsearch\Indice\Repository\Contract\State\SettingsStateRepository
 *
 * @private Elastic\Elasticsearch\ClientInterface client
 */
final readonly class SettingsStateRepository implements
    Elastic\Elasticsearch\Indice\Repository\Contract\State\SettingsStateRepository
{
    /**
     * @param Elastic\Elasticsearch\ClientInterface $client
     */
    public function __construct(private Elastic\Elasticsearch\ClientInterface $client)
    {
    }

    /**
     * @param string $index
     * @param array $settings
     * @return $this
     * @throws Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function put(string $index, array $settings): self
    {
        $this->client->indices()
            ->putSettings([
                'index' => $index,
                'body' => [
                    'settings' => $settings,
                ],
            ]);

        $this->client->getLogger()->info("Put settings", [
                'index' => $index,
                'settings' => $settings,
            ]);

        return $this;
    }
}
