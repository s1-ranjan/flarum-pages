<?php

namespace S1ranjan\Pages\Api\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use Flarum\Api\Controller\AbstractShowController;
use S1ranjan\Pages\Model\Page;
use S1ranjan\Pages\Api\Serializer\PageSerializer;

class UpdatePageController extends AbstractShowController
{
    public $serializer = PageSerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $id = $request->getAttribute('id');
        $data = $request->getParsedBody()['data']['attributes'];

        $page = Page::findOrFail($id);

        $page->update([
            'title' => $data['title'] ?? $page->title,
            'slug' => $data['slug'] ?? $page->slug,
            'content' => $data['content'] ?? $page->content,
            'is_published' => $data['isPublished'] ?? $page->is_published,
            'show_in_nav' => $data['showInNav'] ?? $page->show_in_nav,
            'meta_description' => $data['metaDescription'] ?? $page->meta_description,
        ]);

        return $page;
    }
}
