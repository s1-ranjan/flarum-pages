<?php

namespace S1ranjan\Pages\Api\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use Flarum\Api\Controller\AbstractListController;
use S1ranjan\Pages\Model\Page;
use S1ranjan\Pages\Api\Serializer\PageSerializer;

class ListPageController extends AbstractListController
{
    public $serializer = PageSerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        return Page::all();
    }
}
