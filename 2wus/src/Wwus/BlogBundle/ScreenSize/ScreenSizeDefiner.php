<?php
namespace Wwus\BlogBundle\ScreenSize;

use Symfony\Component\HttpFoundation\Response;

class ScreenSizeDefiner
{
    protected $largeurEcran;
    protected $hauteurEcran;

    public function __construct()
    {
        $this->largeurEcran = document.documentElement.clientWidth;
        $this->hauteurEcran = document.documentElement.clientHeight;
    }

    public function alerte()
    {
        alert('test réussi');
    }
}