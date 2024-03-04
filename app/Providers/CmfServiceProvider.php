<?php

namespace App\Providers;

use App\Cmf\Modules\ProjectModule;
use ReinVanOyen\Cmf\CmfApplicationServiceProvider;
use ReinVanOyen\Cmf\Modules\UserModule;
use ReinVanOyen\Cmf\Modules\MediaLibraryModule;

class CmfServiceProvider extends CmfApplicationServiceProvider
{
    public function modules(): array
    {
        return [
            ProjectModule::class,
            UserModule::class,
            MediaLibraryModule::class,
        ];
    }
}
