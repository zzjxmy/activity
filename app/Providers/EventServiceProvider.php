<?php

namespace App\Providers;

use App\Listeners\ActivityCommitSuccessListener;
use App\Listeners\ActivityListener;
use App\Listeners\QueryListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        \Illuminate\Database\Events\QueryExecuted::class => [
            QueryListener::class
        ],
        \App\Events\ActivityEvent::class => [
            ActivityListener::class
        ],
        \App\Events\ActivityCommitSuccessEvent::class => [
            ActivityCommitSuccessListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
