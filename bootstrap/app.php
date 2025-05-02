<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'test1' => 'App\Http\Middleware\firstMiddleware',
            'age' => 'App\Http\Middleware\AgeMiddleware',
            'user' => 'App\Http\Middleware\UserMiddleware',
        ]);
        $middleware->prependToGroup('test', [
            'App\Http\Middleware\AgeMiddleware',
            'App\Http\Middleware\UserMiddleware',
        ]);    
        //$middleware->append('App\Http\Middleware\AgeMiddleware');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();