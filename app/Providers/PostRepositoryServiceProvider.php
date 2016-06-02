<?php
/**
 * Created by PhpStorm.
 * User: ridho
 * Date: 5/12/16
 * Time: 2:39 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('App\Repositories\BaseRepository', 'App\Repositories\PostRepository');
    }

}