<?php

namespace S1ranjan\Pages\Controller;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface;
use S1ranjan\Pages\Model\Page;

class ShowPageController
{
    public function __invoke(ServerRequestInterface $request)
    {
        $slug = $request->getAttribute('slug');

        $page = Page::where('slug', $slug)
            ->where('is_published', 1)
            ->firstOrFail();

        return new HtmlResponse(
            "<div class='container'>
                <h1>{$page->title}</h1>
                {$page->content}
            </div>"
        );
    }
}
