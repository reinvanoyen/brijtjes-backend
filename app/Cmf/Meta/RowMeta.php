<?php

namespace App\Cmf\Meta;

use ReinVanOyen\Cmf\Components\TextView;
use ReinVanOyen\Cmf\Meta;
use App\Models\Row;

class RowMeta extends Meta
{
    /**
     * @var string $model
     */
    protected static $model = Row::class;

    /**
     * @var string $title
     */
    protected static $title = 'id';

    /**
     * @var int $perPage
     */
    protected static $perPage = 10;

    /**
     * @var array $searchColumns
     */
    protected static $search = [
        'id',
    ];

    /**
     * @return array
     */
    public static function index(): array
    {
        return [
            TextView::make('id'),
        ];
    }

    /**
     * @return array
     */
    public static function create(): array
    {
        return [];
    }
}
