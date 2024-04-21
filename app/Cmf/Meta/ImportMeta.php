<?php

namespace App\Cmf\Meta;

use ReinVanOyen\Cmf\Meta;

class ImportMeta extends Meta
{
    /**
     * @var string $model
     */
    protected static $model = 'Import';

    /**
     * @var string $title
     */
    protected static $title = 'title';

    /**
     * @var int $perPage
     */
    protected static $perPage = 50;

    /**
     * @var array $searchColumns
     */
    protected static $search = [];

    /**
     * @var int[] $indexGrid
     */
    protected static $indexGrid = [];

    /**
     * @var array $sort
     */
    protected static $sort = [];
}
