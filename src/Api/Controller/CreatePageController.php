<?php

namespace S1ranjan\Pages\Api\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use Flarum\Api\Controller\AbstractCreateController;
use S1ranjan\Pages\Model\Page;
use S1ranjan\Pages\Api\Serializer\PageSerializer;

class CreatePageController extends AbstractCreateController
{
    public $serializer = PageSerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $actor = $request->getAttribute('actor');
        $data = $request->getParsedBody()['data']['attributes'];

        $page = Page::create([
            'title' => $data['title'] ?? '',
            'slug' => $data['slug'] ?? '',
            'content' => $data['content'] ?? '',
            'is_published' => $data['isPublished'] ?? true,
            'show_in_nav' => $data['showInNav'] ?? false,
            'meta_description' => $data['metaDescription'] ?? null,
        ]);

        return $page;
    }
}
