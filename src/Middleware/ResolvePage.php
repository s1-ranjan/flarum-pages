<?php

namespace S1Ranjan\Pages\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use S1Ranjan\Pages\Page;

class ResolvePage implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        // Only intercept 404 responses
        if ($response->getStatusCode() !== 404) {
            return $response;
        }

        $path = trim($request->getUri()->getPath(), '/');

        if (!$path) {
            return $response;
        }

        $page = Page::where('slug', $path)
            ->where('is_published', true)
            ->first();

        if (!$page) {
            return $response;
        }

        return new HtmlResponse("
            <h1>{$page->title}</h1>
            <div>{$page->content}</div>
        ");
    }
}
