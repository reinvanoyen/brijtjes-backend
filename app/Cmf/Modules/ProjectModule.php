<?php

namespace App\Cmf\Modules;

use App\Cmf\Meta\ProjectMeta;
use ReinVanOyen\Cmf\Action\Action;
use ReinVanOyen\Cmf\Action\Delete;
use ReinVanOyen\Cmf\Action\Index;
use ReinVanOyen\Cmf\Action\Create;
use ReinVanOyen\Cmf\Action\Edit;
use ReinVanOyen\Cmf\Components\Icon;
use ReinVanOyen\Cmf\Components\ManualOrderControls;
use ReinVanOyen\Cmf\Module;
use ReinVanOyen\Cmf\Components\Link;

class ProjectModule extends Module
{
    /**
     * @return string
     */
    protected function title(): string
    {
        return 'Projecten';
    }

    /**
     * @return string
     */
    protected function icon()
    {
        return 'gesture';
    }

    /**
     * @return Action
     */
    public function index(): Action
    {
        return Index::make(ProjectMeta::class)
            ->prepend(ManualOrderControls::make(),)
            ->header([
                Link::make('Nieuw project', 'create')
                    ->style('primary'),
            ])
            ->actions([
                Icon::make('edit')->to('edit'),
                Icon::make('delete')->to('delete'),
            ]);
    }

    /**
     * @return Action
     */
    public function delete(): Action
    {
        return Delete::make(ProjectMeta::class);
    }

    /**
     * @return Action
     */
    public function create(): Action
    {
        return Create::make(ProjectMeta::class);
    }

    /**
     * @return Action
     */
    public function edit(): Action
    {
        return Edit::make(ProjectMeta::class);
    }
}
