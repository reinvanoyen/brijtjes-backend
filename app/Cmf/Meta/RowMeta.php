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
    protected static $title = 'text';

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
     * @return string
     */
    public static function getSingular(): string
    {
        return 'Brijtje';
    }

    /**
     * @return string
     */
    public static function getPlural(): string
    {
        return 'Brijtjes';
    }

    /**
     * @return array
     */
    public static function index(): array
    {
        return [
            TextView::make('text'),
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
