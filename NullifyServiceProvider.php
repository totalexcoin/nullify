<?php

namespace Totalexcoin\Nullify;

use Illuminate\Support\ServiceProvider;

class NullifyServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        
    }


    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/src/routes.php');
    }
}