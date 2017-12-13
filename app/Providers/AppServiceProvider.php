<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LINE\LINEBot;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // LINE BOT
        $this->app->bind('line-bot', function ($app, array $parameters) {
            // $parametersを見て、SECRETとかTOKENをDBとかNoSQLから取ってくることが多い
            return new LINEBot(
                new LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN')),
                ['channelSecret' => env('LINE_CHANNEL_SECRET')]
            );
        });
    }
}
