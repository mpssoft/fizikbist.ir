<?php

return [
    App\Providers\AppServiceProvider::class,
    Alexusmai\LaravelFileManager\FileManagerServiceProvider::class,
    Modules\Shop\Providers\RouteServiceProvider::class,
    Modules\Shop\Providers\EventServiceProvider::class,
    Modules\Conversation\Providers\RouteServiceProvider::class,
    Modules\Sms\Providers\RouteServiceProvider::class,
    Modules\File\Providers\RouteServiceProvider::class,
];
