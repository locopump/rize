<?php


namespace App\Providers;


//use Carbon\Laravel\ServiceProvider;
use App\Models\Repositories\Publico\Areas\AreasInterface;
use App\Models\Repositories\Publico\Areas\AreasRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AreasInterface::class, AreasRepository::class);
    }

}
