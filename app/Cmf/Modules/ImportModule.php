<?php

namespace App\Cmf\Modules;

use App\Cmf\Actions\Import;
use App\Cmf\Actions\SettingsForm;
use ReinVanOyen\Cmf\Action\Action;
use ReinVanOyen\Cmf\Module;

class ImportModule extends Module
{
    protected function title(): string
    {
        return 'Importeren';
    }

    protected function icon()
    {
        return 'description';
    }

    /**
     * @return bool
     */
    public function inPrimaryNavigation(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function inSecondaryNavigation(): bool
    {
        return true;
    }

    /**
     * @return Action
     */
    public function index(): Action
    {
        return Import::make();
    }
}
