<?php

namespace S1ranjan\Pages\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use S1ranjan\Pages\Model\Page;

class PageSerializer extends AbstractSerializer
{
    protected $type = 'pages';

    protected function getDefaultAttributes($page)
    {
        return [
            'title' => $page->title,
            'slug' => $page->slug,
            'content' => $page->content,
            'isPublished' => $page->is_published,
            'showInNav' => $page->show_in_nav,
            'metaDescription' => $page->meta_description,
        ];
    }
}
