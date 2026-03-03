<?php

use Flarum\Extend;
use Flarum\Extend\Migrations;
use S1Ranjan\Pages\Middleware\ResolvePage;

return [

    (new Migrations())
        ->migrations(__DIR__.'/migrations'),

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class),

];
