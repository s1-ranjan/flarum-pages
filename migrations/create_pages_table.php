<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (! $schema->hasTable('pages')) {
            $schema->create('pages', function (Blueprint $table) {
                $table->id();

                $table->string('title');
                $table->string('slug')->unique();

                $table->text('content');

                $table->boolean('is_published')->default(true)->index();
                $table->boolean('show_in_nav')->default(false)->index();

                $table->string('meta_description')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('created_at');
            });
        }
    },

    'down' => function (Builder $schema) {
        if ($schema->hasTable('pages')) {
            $schema->drop('pages');
        }
    },
];
