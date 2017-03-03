<?php

namespace ScoutElastic\Console;

use ScoutElastic\Facades\ElasticClient;

class ElasticIndexDropCommand extends ElasticIndexCommand
{
    protected $name = 'elastic:drop-index';

    protected $description = 'Drop an Elasticsearch index';

    public function fire()
    {
        $configurator = $this->getConfigurator();

        ElasticClient::indices()
            ->delete(['index' => $configurator->getName()]);

        $this->info(sprintf(
            'Index %s was deleted!',
            $configurator->getName()
        ));
    }
}