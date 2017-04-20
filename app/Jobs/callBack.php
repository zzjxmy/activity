<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class callBack implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $controller,$data,$title;
    private $namespace = '\App\Http\Controllers\CallBack\\';
    private $defaultFunction = 'handle';

    /**
     * callBack constructor.
     * @param $title
     * @param $controller
     * @param array $data
     */
    public function __construct($title,$controller,array $data)
    {
        $this->title = $title;
        $this->controller = $controller;
        $this->data = $data;
    }

    /**
     * 执行任务
     *
     * @return void
     */
    public function handle()
    {
        $callBack = $this->namespace.$this->controller.'::'.$this->defaultFunction;
        call_back($callBack,$this->data);
    }
}
