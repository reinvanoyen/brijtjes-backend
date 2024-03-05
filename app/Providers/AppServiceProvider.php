<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use ReinVanOyen\Cmf\Contracts\MediaConverter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $converter = app(MediaConverter::class);

        $converter->registerConversion('thumb', function (Image $image) {
            $image->fit(560, 560);
            $image->sharpen(3);
        });
    }
}
