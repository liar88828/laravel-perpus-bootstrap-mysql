<?php

namespace App\Providers;

use App\Services\implement\ImplIndonesiaFormService;
use App\Services\IndonesiaFormatServices;
use Illuminate\Contracts\Support\DeferrableProvider;

//use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IndonesiaFormatProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */

    public array $singletons = [
        IndonesiaFormatServices::class => ImplIndonesiaFormService::class
    ];

    public function provides(): array
    {
        return [IndonesiaFormatServices::class];
    }

    public function register(): void
    {

//        $this->app->bind('phoneformatter', function ($app) {
//            return new ImplIndonesiaFormService();
//        });


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register the Blade directive
        Blade::directive('formattedNumber', function (string $phoneNumber) {
            return "<?php echo app('App\Services\implement\ImplIndonesiaFormService')->formatPhoneNumber($phoneNumber); ?>";
        });

        Blade::directive('convertToRupiah', function (string  $amount) {
            return "<?php echo 'Rp. ' . number_format($amount, 0, ',', '.'); ?>";
        });
    }
}
