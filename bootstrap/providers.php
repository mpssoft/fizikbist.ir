<?php

return [
    App\Providers\AppServiceProvider::class,
    Alexusmai\LaravelFileManager\FileManagerServiceProvider::class,
    Modules\Shop\Providers\RouteServiceProvider::class,
    Modules\Shop\Providers\EventServiceProvider::class,
    Modules\Conversation\Providers\RouteServiceProvider::class,
    Modules\Sms\Providers\RouteServiceProvider::class,
    Modules\File\Providers\RouteServiceProvider::class,
    Modules\Splash\Providers\RouteServiceProvider::class,
    Modules\Motion\Providers\RouteServiceProvider::class,
    Modules\LessonPlan\Providers\RouteServiceProvider::class,
    Modules\Blog\Providers\RouteServiceProvider::class,
];
