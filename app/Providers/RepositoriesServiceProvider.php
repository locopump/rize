<?php


namespace App\Providers;


//use Carbon\Laravel\ServiceProvider;
use App\Models\Repositories\Publico\Areas\AreasInterface;
use App\Models\Repositories\Publico\Areas\AreasRepository;
use App\Models\Repositories\Publico\Counts\CountsInterface;
use App\Models\Repositories\Publico\Counts\CountsRepository;
use App\Models\Repositories\Publico\Likes\LikesInterface;
use App\Models\Repositories\Publico\Likes\LikesRepository;
use App\Models\Repositories\Publico\Pages\PagesInterface;
use App\Models\Repositories\Publico\Pages\PagesRepository;
use App\Models\Repositories\Publico\Sales\SalesInterface;
use App\Models\Repositories\Publico\Sales\SalesRepository;
use App\Models\Repositories\Publico\SsTenants\SsTenantsInterface;
use App\Models\Repositories\Publico\SsTenants\SsTenantsRepository;
use App\Models\Repositories\Publico\Tenants\TenantsInterface;
use App\Models\Repositories\Publico\Tenants\TenantsRepository;
use App\Models\Repositories\Publico\Venues\VenuesInterface;
use App\Models\Repositories\Publico\Venues\VenuesRepository;
use App\Models\Repositories\Publico\Visitors\VisitorsInterface;
use App\Models\Repositories\Publico\Visitors\VisitorsRepository;
use App\Models\Repositories\Publico\Visits\VisitsInterface;
use App\Models\Repositories\Publico\Visits\VisitsRepository;
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
        $this->app->bind(CountsInterface::class, CountsRepository::class);
        $this->app->bind(LikesInterface::class, LikesRepository::class);
        $this->app->bind(PagesInterface::class, PagesRepository::class);
        $this->app->bind(SalesInterface::class, SalesRepository::class);
        $this->app->bind(SsTenantsInterface::class, SsTenantsRepository::class);
        $this->app->bind(TenantsInterface::class, TenantsRepository::class);
        $this->app->bind(VenuesInterface::class, VenuesRepository::class);
        $this->app->bind(VisitorsInterface::class, VisitorsRepository::class);
        $this->app->bind(VisitsInterface::class, VisitsRepository::class);
    }

}
