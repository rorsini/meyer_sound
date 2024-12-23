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

    public function testColor(string $testStatus): string
    {
        $color = 'navy';
        switch ($testStatus) {
            case 'Pass':
                $color = '#239b56';
                break;
            case 'Fail':
                $color = '#e74c3c';
                break;
            case 'Test Error':
                $color = '#8e44ad';
                break;
            case 'Not Runi':
                $color = '#85929e';
                break;
        }
        return $color;
    }
}
