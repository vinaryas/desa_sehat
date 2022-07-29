<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Pagination\Paginator;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
			$event->menu->add('NAVIGASI UTAMA');
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => route('home'),
                'icon' => 'fas fa-tachometer-alt',
            ]);

            $event->menu->add([
                'text' => 'Form',
                'url' => route('form.index'),
                'icon' => 'fas fa-file',
            ]);
		});
    }
}
