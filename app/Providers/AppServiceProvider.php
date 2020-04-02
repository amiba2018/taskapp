<?php
namespace App\Providers;
// use Illuminate\Support\Facades\DB;
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
        // $this->app->bind(
        //     'Illuminate\Contracts\Auth\Registrar',
        //     'App\Services\Registrar'
        // );
        // // ログレベルの設定
        // $monolog = Log::getMonoLog();
        // foreach ($monolog->getHandlers() as $handler) {
        //     $handler->setLevel(env('APP_LOG_LEVEL', 'error'));
        // }
        app()->bind('myName', function(){
            return 'John Doe';
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // DB::listen(function ($query) {
        //     $query->sql
        //     $query->bindings
        //     $query->time
        // });
        // if (config('app.env') !== 'production') {
        //     DB::listen(function ($query) {
        //         Log::info("Query Time:{$query->time}s] $query->sql");
        //     });
    }
}