<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        Model::shouldBeStrict(); // enables strict mode for all models

        // Setting up the limiter for the application form
        RateLimiter::for('leads-signup', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip())->response(function (Request $request, array $headers) {
                return response()->json([
                    'success' => false,
                    'message' => 'Слишком много попыток! Пожалуйста, подождите минуту перед следующей отправкой.'
                ], 429, $headers); // Code 429 Too Many Requests
            });
        });

        // Если приложение запущено на продакшене (на Render), принудительно включаем HTTPS
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
