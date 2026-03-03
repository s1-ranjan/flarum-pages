<?php

namespace S1ranjan\Pages\Model;

use Flarum\Database\AbstractModel;

class Page extends AbstractModel
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'show_in_nav',
        'meta_description'
    ];
}
