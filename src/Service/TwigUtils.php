<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class TwigUtils
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function navClass(string $currPage): string
    {
        $request = $this->requestStack->getCurrentRequest();
        $route = $request->attributes->get('_route');
        return (str_contains($route, $currPage)) ? 'curr' : 'button';
    }

    public function getRoute(): string
    {
        $request = $this->requestStack->getCurrentRequest();
        $route = $request->attributes->get('_route');
        return $route;
    }
}
