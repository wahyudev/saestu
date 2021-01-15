<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }
    public function map()
    {
        
        $this->mapAdminRoutes();
        $this->mapAuthRoutes();
        $this->mapHomeRoutes();        
        
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web','logged')
             ->prefix('admin')
             ->namespace('App\Http\Controllers\Admin')
             ->group(base_path('routes/admin.php'));
    }
   
    protected function mapAuthRoutes()
    {
        Route::middleware('web') 
             ->namespace('App\Http\Controllers\Auth')
             ->group(base_path('routes/auth.php'));
    }
    protected function mapHomeRoutes()
    {
        Route::middleware('web')   
             ->namespace('App\Http\Controllers\home')
             ->group(base_path('routes/home.php'));
    }     
}
