<?php

namespace App\Cmf\Meta;

use ReinVanOyen\Cmf\Components\ContentBlocks;
use ReinVanOyen\Cmf\Components\FileSelectField;
use ReinVanOyen\Cmf\Components\Tabs;
use ReinVanOyen\Cmf\Components\TextField;
use ReinVanOyen\Cmf\Components\TextToSlugField;
use ReinVanOyen\Cmf\Components\TextView;
use ReinVanOyen\Cmf\Components\Thumb;
use ReinVanOyen\Cmf\Meta;
use App\Models\Project;
use ReinVanOyen\Cmf\Searchers\LikeSearcher;
use ReinVanOyen\Cmf\Searchers\Searcher;

class ProjectMeta extends Meta
{
    /**
     * @var string $model
     */
    protected static $model = Project::class;

    /**
     * @var string $title
     */
    protected static $title = 'title';

    /**
     * @var int $perPage
     */
    protected static $perPage = 10;

    protected static $indexGrid = [
        0, 1,
    ];

    /**
     * @return Searcher|null
     */
    public static function searcher(): ?Searcher
    {
        return new LikeSearcher(['title',]);
    }

    /**
     * @return array
     */
    public static function index(): array
    {
        return [
            Thumb::make('photo'),
            TextView::make('title')->style('primary'),
        ];
    }

    public static function sidebar(): array
    {
        return [
            FileSelectField::make('photo'),
        ];
    }

    /**
     * @return array
     */
    public static function create(): array
    {
        return [
            Tabs::make()
                ->tab('General', [
                    TextToSlugField::make('title', 'slug'),
                    TextField::make('description')->multiline(),
                ])
                ->tab('Brijtjes', [
                    ContentBlocks::make('rows', 'type', 'order')
                        ->block('Row', 'row', [
                            TextField::make('text')->multiline(),
                        ]),
                ]),
        ];
    }
}
