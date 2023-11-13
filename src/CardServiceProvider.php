<?php

namespace NormanHuth\NovaWatchCard;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use NormanHuth\NovaBasePackage\ServiceProviderTrait;

class CardServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-watch-card', __DIR__ . '/../dist/js/card.js');

            $file = lang_path('vendor/nova-watch-card/' . $this->app->getLocale() . '.json');
            if (file_exists($file)) {
                Nova::translations($file);
            } else {
                $file = __DIR__ . '/../lang/' . $this->app->getLocale() . '.json';
                if (file_exists($file)) {
                    Nova::translations($file);
                }
            }
        });

        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/nova-watch-card'),
        ], 'nova-watch-card-translations');

        $this->addAbout();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
