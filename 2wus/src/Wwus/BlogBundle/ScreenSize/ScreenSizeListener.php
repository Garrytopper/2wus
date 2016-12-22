<?php

namespace Wwus\BlogBundle\screenSize ;

use Symfony\Component\HttpFoundation\Response;

class ScreenSizeListener
{
    protected $screenSize ;

    public function __construct(ScreenSizeDefiner $screenSize)
    {
        $this->screenSize = $screenSize;
    }

    public function processScreenSize()
    {
        $this->screenSize->alerte();
    }
}