<?php

namespace S1ranjan\Pages\Listener;

use Flarum\Frontend\Event\Rendering;
use S1ranjan\Pages\Model\Page;

class AddNavbarLinks
{
    public function handle(Rendering $event)
    {
        if ($event->isForum()) {

            $pages = Page::where('show_in_nav', true)->get();

            $event->view->getEngine()->addData([
                'pages' => $pages
            ]);
        }
    }
}
