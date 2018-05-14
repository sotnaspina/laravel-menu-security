<?php

namespace SotnasPina\MenuSecurity;

use Illuminate\Support\ServiceProvider;

class MenuSecurityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();

        //\Event::listen('eloquent.', function ($eventName, array $eventData) {});
    }

    public function register()
    {
        # code...
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig() {
        $this->publishes([
            __DIR__ . '/../config/menu-security.php' => config_path('menu-security.php'),
                ], 'config');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews() {
        $viewPath = base_path('resources/views/menu-security');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        /*$this->loadViewsFrom(array_merge(array_map(function ($path) {
                            return $path . '/modules/cerebelosettings';
                        }, \Config::get('view.paths')), [$sourcePath]), 'cerebelosettings');*/
    }
}