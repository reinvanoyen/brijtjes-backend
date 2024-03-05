<?php

namespace App\Cmf\Meta;

use ReinVanOyen\Cmf\Components\ContentBlocks;
use ReinVanOyen\Cmf\Components\FileSelectField;
use ReinVanOyen\Cmf\Components\Stack;
use ReinVanOyen\Cmf\Components\Tabs;
use ReinVanOyen\Cmf\Components\TextField;
use ReinVanOyen\Cmf\Components\TextToSlugField;
use ReinVanOyen\Cmf\Components\TextView;
use ReinVanOyen\Cmf\Components\Thumb;
use ReinVanOyen\Cmf\Meta;
use App\Models\Project;
use ReinVanOyen\Cmf\Searchers\LikeSearcher;
use ReinVanOyen\Cmf\Searchers\Searcher;
use ReinVanOyen\Cmf\Sorters\ManualOrderSorter;
use ReinVanOyen\Cmf\Sorters\Sorter;

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

    /**
     * @var int[] $indexGrid
     */
    protected static $indexGrid = [
        0, 0, 1,
    ];

    /**
     * @return Searcher|null
     */
    public static function searcher(): ?Searcher
    {
        return new LikeSearcher(['title',]);
    }

    /**
     * @return string
     */
    public static function getSingular(): string
    {
        return 'Brijtjes-project';
    }

    /**
     * @return string
     */
    public static function getPlural(): string
    {
        return 'Brijtjes-projecten';
    }

    /**
     * @return Sorter
     */
    public static function sorter(): Sorter
    {
        return new ManualOrderSorter('order');
    }

    /**
     * @return array
     */
    public static function index(): array
    {
        return [
            Thumb::make('photo'),
            Stack::make([
                TextView::make('title')->style('primary'),
                TextView::make('description'),
            ])->vertical()->gapless(),
        ];
    }

    /**
     * @return array
     */
    public static function sidebar(): array
    {
        return [
            FileSelectField::make('photo')->label('foto'),
        ];
    }

    /**
     * @return array
     */
    public static function create(): array
    {
        return [
            Tabs::make()
                ->tab('Algemeen', [
                    TextToSlugField::make('title', 'slug')->validate(['required',])->label('Titel'),
                    TextField::make('description')->multiline()->validate(['required',])->label('Beschrijving'),
                ])
                ->tab('Brijtjes', [
                    ContentBlocks::make('rows', 'type', 'order')
                        ->block('Brijtje', 'row', [
                            TextField::make('text')->multiline(),
                        ])
                        ->label('Brijtjes'),
                ]),
        ];
    }
}
