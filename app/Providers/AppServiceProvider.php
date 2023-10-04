<?php

namespace App\Providers;

use App\Repository\Banner\BannerRepository;
use App\Repository\Banner\BannerRepositoryInterface;
use App\Repository\Blog\BlogRepository;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Repository\Brand\BrandRepository;
use App\Repository\Brand\BrandRepositoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Customer\CustomerRepository;
use App\Repository\Customer\CustomerRepositoryInterface;
use App\Repository\Menu\MenuRepository;
use App\Repository\Menu\MenuRepositoryInterface;
use App\Repository\Order\OrderRepository;
use App\Repository\Order\OrderRepositoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Role\RoleRepository;
use App\Repository\Role\RoleRepositoryInterface;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->singleton(
            BannerRepositoryInterface::class,
            BannerRepository::class
        );
        $this->app->singleton(
            MenuRepositoryInterface::class,
            MenuRepository::class
        );
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->singleton(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
