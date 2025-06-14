<?php

namespace App\Providers;

use App\Enums\AccountStatus;
use App\Enums\TransactionCategory;
use App\Enums\TransactionMethod;
use App\Enums\TransactionType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppConstantsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $key = config('cache.constants');
        $duration = Carbon::now()->addDays(30);

        $accountStatus = AccountStatus::getValuesForSelect();
        $category = TransactionCategory::getValuesForSelect();
        $method = TransactionMethod::getValuesForSelect();
        $type = TransactionType::getValuesForSelect();

        Cache::put($key, [
            'accountStatus' => $accountStatus,
            'category' => $category,
            'method' => $method,
            'type' => $type,
        ], $duration);
    }
}
