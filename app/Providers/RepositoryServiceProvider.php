<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\BannerContract;
use App\Repositories\BannerRepository;
use App\Contracts\AdminContract;
use App\Repositories\AdminRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\BusinessContract;
use App\Repositories\BusinessRepository;
use App\Contracts\StateContract;
use App\Repositories\StateRepository;
use App\Contracts\PincodeContract;
use App\Repositories\PincodeRepository;
use App\Contracts\SuburbContract;
use App\Repositories\SuburbRepository;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\EventContract;
use App\Repositories\EventRepository;
use App\Contracts\DealContract;
use App\Repositories\DealRepository;
use App\Contracts\PropertyContract;
use App\Repositories\PropertyRepository;
use App\Contracts\BlogContract;
use App\Repositories\BlogRepository;
use App\Contracts\NotificationContract;
use App\Repositories\NotificationRepository;
use App\Contracts\LoopContract;
use App\Repositories\LoopRepository;
use App\Contracts\EventformatContract;
use App\Repositories\EventformatRepository;
use App\Contracts\LanguageContract;
use App\Repositories\LanguageRepository;
use App\Contracts\AdvertisementContract;
use App\Repositories\AdvertisementRepository;
use App\Contracts\MarketCategoryContract;
use App\Repositories\MarketCategoryRepository;
use App\Contracts\MarketSubCategoryContract;
use App\Repositories\MarketSubCategoryRepository;
use App\Contracts\MarketProductContract;
use App\Repositories\MarketProductRepository;
use App\Contracts\MarketOrderContract;
use App\Repositories\MarketOrderRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class            =>  AdminRepository::class,
        BannerContract::class           =>  BannerRepository::class,
        UserContract::class             =>  UserRepository::class,
        BusinessContract::class         =>  BusinessRepository::class,
        StateContract::class            =>  StateRepository::class,
        PincodeContract::class          =>  PincodeRepository::class,
        SuburbContract::class           =>  SuburbRepository::class,
        CategoryContract::class         =>  CategoryRepository::class,
        EventContract::class            =>  EventRepository::class,
        DealContract::class             =>  DealRepository::class,
        PropertyContract::class         =>  PropertyRepository::class,
        BlogContract::class             =>  BlogRepository::class,
        NotificationContract::class     =>  NotificationRepository::class,
        LoopContract::class             =>  LoopRepository::class,
        EventformatContract::class      =>  EventformatRepository::class,
        LanguageContract::class         =>  LanguageRepository::class,
        AdvertisementContract::class    =>  AdvertisementRepository::class,
        MarketCategoryContract::class    =>  MarketCategoryRepository::class,
        MarketSubCategoryContract::class    =>  MarketSubCategoryRepository::class,
       MarketProductContract::class    => MarketProductRepository::class,
        MarketOrderContract::class    =>  MarketOrderRepository::class,

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
