<?php

return [
    Modules\Blog\Providers\BlogServiceProvider::class,
    Modules\Shop\Providers\ShopServiceProvider::class,
    Modules\Conversation\Providers\ConversationServiceProvider::class,
    Modules\Sms\Providers\SmsServiceProvider::class,
    Modules\File\Providers\FileServiceProvider::class,
    Modules\Splash\Providers\SplashServiceProvider::class,
    Modules\Motion\Providers\MotionServiceProvider::class,
    Modules\LessonPlan\Providers\LessonPlanServiceProvider::class,
    Modules\Like\Providers\LikeServiceProvider::class,

    App\Providers\AppServiceProvider::class,
    Alexusmai\LaravelFileManager\FileManagerServiceProvider::class,
    Modules\Shop\Providers\RouteServiceProvider::class,
    Modules\Conversation\Providers\RouteServiceProvider::class,
    Modules\Sms\Providers\RouteServiceProvider::class,
    Modules\File\Providers\RouteServiceProvider::class,
    Modules\Splash\Providers\RouteServiceProvider::class,
    Modules\Motion\Providers\RouteServiceProvider::class,
    Modules\LessonPlan\Providers\RouteServiceProvider::class,
    Modules\Blog\Providers\RouteServiceProvider::class,
    Modules\Like\Providers\RouteServiceProvider::class,
];
