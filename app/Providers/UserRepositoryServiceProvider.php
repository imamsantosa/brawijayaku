<?php
/**
 * Created by PhpStorm.
 * User: ridho
 * Date: 5/12/16
 * Time: 1:20 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('App\Repositories\BaseRepository', 'App\Repositories\UserRepository');
    }

}