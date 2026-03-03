<?php

namespace S1ranjan\Pages\Api\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Flarum\Api\Controller\AbstractDeleteController;
use S1ranjan\Pages\Model\Page;

class DeletePageController extends AbstractDeleteController
{
    protected function delete(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');

        $page = Page::findOrFail($id);
        $page->delete();
    }
}
