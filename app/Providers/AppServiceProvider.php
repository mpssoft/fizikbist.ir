<?php

namespace App\Providers;

use App\Notifications\Channels\MelipayamakChannel;
use App\Notifications\Channels\RayganSmsChannel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->usePublicPath(__DIR__."/../../public_html");

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(base_path('Modules/Shop/resources/views'), 'shop');
        $this->loadViewsFrom(base_path('Modules/Conversation/resources/views'), 'conversation');
        $this->loadViewsFrom(base_path('Modules/Sms/resources/views'), 'sms');
        $this->loadViewsFrom(base_path('Modules/Blog/resources/views'), 'blog');
        $this->loadViewsFrom(base_path('Modules/File/resources/views'), 'file');
        $this->loadViewsFrom(base_path('Modules/Splash/resources/views'), 'splash');
        $this->loadViewsFrom(base_path('Modules/Motion/resources/views'), 'motion');
        $this->loadViewsFrom(base_path('Modules/LessonPlan/resources/views'), 'lessonplan');
        $this->loadViewsFrom(base_path('Modules/Like/resources/views'), 'like');
        Notification::extend('raygansms', function ($app) {
            return new RayganSmsChannel();
        });
        Notification::extend('melipayamak', function ($app) {
            return new MelipayamakChannel();
        });
        Relation::enforceMorphMap([
            'blog'    => \Modules\Blog\Models\Blog::class,
            'course'    => \App\Models\Course::class,
            'lesson'    => \App\Models\Lesson::class,
            'file'    => \Modules\File\Models\File::class,
            'lessonplan'    => \Modules\LessonPlan\Models\LessonPlan::class,
            'lesson_plan'    => \Modules\LessonPlan\Models\LessonPlan::class,

        ]);
    }
}
